<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;
use SRP\Models\jogos\TipoCampeonato;
use SRP\Models\DFutebol\Categorias;

class Campeonatos extends Model
{
    protected $table      = 'CAMPEONATO';
    protected $fillable   = ['ID_CAMPEONATO'
        , 'CAMP_ANO'
        , 'ID_CRITERIO_01'
        , 'ID_CRITERIO_02'
        , 'ID_CRITERIO_03'
        , 'ID_CRITERIO_04'
        , 'ID_CRITERIO_05'
        , 'ID_CRITERIO_06'
        , 'ID_PONTUACAO'
        , 'ID_TIME_CAMPEAO'
        , 'ID_TIME_VICE'
        , 'ID_TIPOCAMP'
        , 'CAMP_NUM_REBAIXA'
        , 'CAMP_CLASSIF_1'
        , 'CAMP_CLASSIF_2'
        , 'ID_TIPOCAMP_1'
        , 'ID_TIPOCAMP_2'
        , 'ID_CATEGORIA'
        , 'TMP_PARTIDA'
        , 'CAMP_DATA_INICIAL'
        , 'CAMP_DATA_FINAL'
        , 'CAMP_DATA_INSCRICAO'
    ];
    protected $primaryKey = 'ID_CAMPEONATO';

    public $timestamps = false;

    public static $rules = array(
        'CAMP_ANO'   => 'required|min:4',
        'ID_TIPOCAMP' => 'required',
        'ID_CATEGORIA' => 'required',
    );

    public function tipo_campeonato(){
        return $this->belongsTo(TipoCampeonato::class, 'ID_TIPOCAMP', 'ID_TIPOCAMP');
    }

    public function categoria(){
        return $this->belongsTo(Categorias::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }
}
