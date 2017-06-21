<?php

function bmp2resource ( $file, $temp, $type, &$out )
{
    if ( $type == 'file' && ! ( $io = fopen ( $file, 'rb') ) )
    {
        return false;
    }

    if ( $type == 'file' )
    {
        $next = fread ( $io, 14 );
    }
    else
    {
        $next = substr ( $temp, 0, 14 );
        $temp = substr ( $temp, 14 );
    }

    $data = unpack ( 'vtype/Vsize/Vreserved/Voffset', $next );

    if ( $data['type'] != 19778 )
    {
        return false;
    }

    if ( $type == 'file' )
    {
        $next = fread ( $io, 40 );
    }
    else
    {
        $next = substr ( $temp, 0, 40 );
        $temp = substr ( $temp, 40 );
    }

    $image = unpack ( 'Vsize/Vbiw/Vbih/vbip/vbpp/Vbic/Vbis/Vihr/Vivr/Vnuc/Vnic', $next );

    $image['color'] = pow ( 2, $image['bpp'] );

    if ( $image['bis'] == 0 )
    {
        $image['bis'] = ( $data['size'] - $data['offset'] );
    }

    unset ( $data );

    $image['abp'] = ( $image['bpp'] / 8 );

    $image['noc'] = ( ( $image['biw'] * $image['abp'] ) / 4 );

    $image['noc'] -= floor ( ( $image['biw'] * $image['abp'] ) / 4 );

    $image['noc'] = ( 4 - ( 4 * $image['noc'] ) );

    if ( $image['noc'] == 4 )
    {
        $image['noc'] = 0;
    }

    $colors = array();

    if ( $image['color'] < 16777216 )
    {
        $read = ( $image['color'] * 4 );

        if ( $type == 'file' )
        {
            $next = fread ( $io, $read );
        }
        else
        {
            $next = substr ( $temp, 0, $read );
            $temp = substr ( $temp, $read );
        }

        $colors = unpack ( 'V' . $image['color'], $next );
    }

    if ( $type == 'file' )
    {
        $img = fread ( $io, $image['bis'] );
    }
    else
    {
        $img = substr ( $temp, 0, $image['bis'] );
    }

    unset ( $temp, $next );

    $ide = chr ( 0 );

    $out = imagecreatetruecolor ( $image['biw'], $image['bih'] );

    $ipx = 0;

    $ipy = ( $image['bih'] );

    while ( $ipy >= 0 )
    {
        $cpx = 0;

        while ($cpx < $image['biw'] )
        {
            if ( $image['bpp'] == 24 )
            {
                $cc    = @unpack ( 'V', substr ( $img, $ipx, 3 ) . $ide );
            }
            else if ( $image['bpp'] == 16 )
            {
                $cc    = unpack ( 'n', substr ( $img, $ipx, 2 ) );
                $cc[1] = $colors[( $cc[1] + 1 )];
            }
            else if ( $image['bpp'] == 8 )
            {
                $cc    = unpack ( 'n', $ide . substr ( $img, $ipx, 1 ) );
                $cc[1] = $colors[( $cc[1] + 1 )];
            }
            else if ( $image['bpp'] == 4 )
            {
                $cc    = unpack ( 'n', $ide . substr ( $img, floor ( $ipx ), 1 ) );

                if ( ( $ipx * 2 ) % 2 == 0)
                {
                    $cc[1] = ( $cc[1] >> 4 );
                }
                else
                {
                    $cc[1] = ( $cc[1] & 0x0F );
                }

                $cc[1] = $colors[( $cc[1] + 1 )];
            }
            else if ( $image['bpp'] == 1 )
            {
                $cc = unpack ( 'n', $ide . substr ( $img, floor ( $ipx ), 1 ) );

                $cn = ( ( $ipx * 8 ) % 8 );

                switch ( $cn )
                {
                    case 0 :
                        $cc[1] = $cc[1] >> 7;
                        break;
                    case 1 :
                        $cc[1] = ( $cc[1] & 0x40 ) >> 6;
                        break;
                    case 2 :
                        $cc[1] = ( $cc[1] & 0x20 ) >> 5;
                        break;
                    case 3 :
                        $cc[1] = ( $cc[1] & 0x10 ) >> 4;
                        break;
                    case 4 :
                        $cc[1] = ( $cc[1] & 0x8 ) >> 3;
                        break;
                    case 5 :
                        $cc[1] = ( $cc[1] & 0x4 ) >> 2;
                        break;
                    case 6 :
                        $cc[1] = ( $cc[1] & 0x2 ) >> 1;
                        break;
                    case 7 :
                        $cc[1] = ( $cc[1] & 0x1 );
                        break;
                }

                $cc[1] = $colors[( $cc[1] + 1 )];
            }
            else
            {
                return false;
            }

            imagesetpixel ( $out, $cpx, $ipy, $cc[1] );

            $cpx++;

            $ipx += $image['abp'];
        }

        $ipy--;

        $ipx += $image['noc'];
    }

    if ( $type == 'file' )
    {
        fclose ( $io );
    }

    return true;
}

function convert_image ( $io, $type, $quality, $file, $new )
{
    if ( $new )
    {
        $path = substr ( $new, 0, strrpos ( $file, '.' ) + 1 ) . $type;

        switch ( $type )
        {
            case 'gif' :
                imagegif ( $io, $path );
                break;
            case 'jpg' :
                imagejpeg ( $io, $path, $quality );
                break;
            case 'png' :
                imagepng ( $io, $path );
                break;
        }
    }
    else
    {
        switch ( $type )
        {
            case 'gif' :
                imagegif ( $io );
                break;
            case 'jpg' :
                imagejpeg ( $io, $quality );
                break;
            case 'png' :
                imagepng ( $io );
                break;
        }
    }

    imagedestroy ( $io );
}

?>