<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\JogadorFoto
 *
 * @property int $ID_JOGADOR
 * @property mixed $JOGADOR_FOTO
 * @method static \Illuminate\Database\Query\Builder|\SRP\JogadorFoto whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\JogadorFoto whereJOGADORFOTO($value)
 * @mixin \Eloquent
 */
class JogadorFoto extends Model
{
    protected $table      = 'jogador_foto';
    protected $fillable   =
        [
             'ID_JOGADOR'
            ,'JOGADOR_FOTO'
        ];
    protected $primaryKey = 'ID_JOGADOR';
}
