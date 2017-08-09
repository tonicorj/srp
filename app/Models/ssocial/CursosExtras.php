<?php

namespace SRP\Models\ssocial;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\ssocial\CursosExtras
 *
 * @property int $ID_CURSO
 * @property string $CURSO_NOME
 * @property string $CURSO_DT_INICIO
 * @property string $CURSO_DT_FINAL
 * @property string $CURSO_EMPRESA
 * @property string $CURSO_OBS
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\CursosExtras whereCURSODTFINAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\CursosExtras whereCURSODTINICIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\CursosExtras whereCURSOEMPRESA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\CursosExtras whereCURSONOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\CursosExtras whereCURSOOBS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\CursosExtras whereIDCURSO($value)
 * @mixin \Eloquent
 */
class CursosExtras extends Model
{
    protected $table = 'CURSOS_EXTRAS';
    protected $fillable = ['ID_CURSO'
        , 'CURSO_NOME'
        , 'CURSO_DT_INICIO'
        , 'CURSO_DT_FINAL'
        , 'CURSO_EMPRESA'
        , 'CURSO_OBS'
    ];
    protected $primaryKey = 'ID_CURSO';
    public $timestamps = false;


}
