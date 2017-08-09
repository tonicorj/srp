<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;
use SRP\Models\ADM\Cidades;
use SRP\Models\ADM\Paises;

/**
 * SRP\Models\jogos\Estadios
 *
 * @property int $ID_ESTADIO
 * @property string $UF
 * @property int $ID_CIDADE
 * @property int $ID_PAIS
 * @property string $ESTADIO_NOME
 * @property string $ESTADIO_NOME_REAL
 * @property float $ESTADIO_CAPACIDADE
 * @property float $ESTADIO_COMPRIMENTO
 * @property float $ESTADIO_LARGURA
 * @property string $ESTADIO_OBS
 * @property-read \SRP\Models\adm\Paises $paises
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Estadios whereESTADIOCAPACIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Estadios whereESTADIOCOMPRIMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Estadios whereESTADIOLARGURA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Estadios whereESTADIONOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Estadios whereESTADIONOMEREAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Estadios whereESTADIOOBS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Estadios whereIDCIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Estadios whereIDESTADIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Estadios whereIDPAIS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Estadios whereUF($value)
 * @mixin \Eloquent
 */
class Estadios extends Model
{
    protected $table      = 'ESTADIO';
    protected $fillable   = ['ID_ESTADIO'
        , 'UF'
        , 'ID_CIDADE'
        , 'ID_PAIS'
        , 'ESTADIO_NOME'
        , 'ESTADIO_NOME_REAL'
        , 'ESTADIO_CAPACIDADE'
        , 'ESTADIO_OBS'
    ];
    protected $primaryKey = 'ID_ESTADIO';

    public $timestamps = false;

    public static $rules = array(
        'ESTADIO_NOME'   => 'required|min:4',
    );

    public function cidades(){
            $retorno = '';

            if ( !is_null($this->ID_CIDADE) )
            {  $retorno = $this->belongsTo(Cidades::class, 'ID_CIDADE', 'ID_CIDADE'); }

        return $retorno;
    }

    public function paises(){
        return $this->belongsTo(Paises::class, 'ID_PAIS', 'ID_PAIS');
    }
}
