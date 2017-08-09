<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\jogos\Pontuacao
 *
 * @property int $ID_PONTUACAO
 * @property string $PONT_NOME
 * @property int $PONT_VITORIA
 * @property int $PONT_EMPATE
 * @property int $PONT_EMPATE0
 * @property int $PONT_VITORIA_PEN
 * @property int $PONT_DIF_GOLS
 * @property int $PONT_VIT_GOLS
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Pontuacao whereIDPONTUACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Pontuacao wherePONTDIFGOLS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Pontuacao wherePONTEMPATE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Pontuacao wherePONTEMPATE0($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Pontuacao wherePONTNOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Pontuacao wherePONTVITGOLS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Pontuacao wherePONTVITORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Pontuacao wherePONTVITORIAPEN($value)
 * @mixin \Eloquent
 */
class Pontuacao extends Model
{
    protected $table      = 'PONTUACAO';
    protected $fillable   = ['ID_PONTUACAO'
        , 'PONT_NOME'
        , 'PONT_VITORIA'
        , 'PONT_EMPATE'
        , 'PONT_EMPATE0'
        , 'PONT_VITORIA_PEN'
        , 'PONT_DIF_GOLS'
        , 'PONT_VIT_GOLS'
    ];
    protected $primaryKey = 'ID_PONTUACAO';

    public $timestamps = false;

    public static $rules = array(
        'PONT_NOME'   => 'required|min:3',
    );
}
