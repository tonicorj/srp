<?php
/**
 * Created by PhpStorm.
 * User: tonic
 * Date: 27/05/2017
 * Time: 02:28
 *
 * traz a imagem do jogador
 *
 */
//require 'SimpleImage.php';
//include 'bmp_resource.php';
//include 'Bmp.php';

$id = $_GET['id'];
$arq = './fotos/JOG' . $id . '_.jpg';

if(!file_exists($arq)) {
    echo "Arquivo não encontrado!";
}
else {
    $_get = file_get_contents($arq);
    if ( $_get == FALSE) {
        echo "Erro 1";
    }
    else {
        $im = imagecreatefromstring(file_get_contents($arq));
        header("Content-Type: image/bmp");
        imagejpeg($im);

        if ($im == FALSE) {
            echo "Erro create";
        }
    }
}

