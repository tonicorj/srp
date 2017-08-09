<?php

namespace SRP\Models\ssocial;

use Illuminate\Database\Eloquent\Model;
use SRP\Models\DFutebol\Categorias;
use SRP\Models\DFutebol\Jogadores;


/**
 * SRP\Models\ssocial\ausenciaescolar
 *
 * @property int $ID_PRESENCA
 * @property string $PRESENCA_DATA
 * @property int $ID_JOGADOR
 * @property string $FLAG_DISPENSA
 * @property int $ID_MOTIVO_AUSENCIA_ESCOLAR
 * @property string $FALTA_OBSERVACAO
 * @property string $FLAG_ATRASO
 * @property-read \SRP\Models\DFutebol\Categorias $categoria
 * @property-read \SRP\Models\DFutebol\Jogadores $jogador
 * @property-read \SRP\Models\ssocial\motivoAusenciaEscolar $motivo_ausencia
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\ausenciaescolar whereFALTAOBSERVACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\ausenciaescolar whereFLAGATRASO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\ausenciaescolar whereFLAGDISPENSA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\ausenciaescolar whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\ausenciaescolar whereIDMOTIVOAUSENCIAESCOLAR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\ausenciaescolar whereIDPRESENCA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\ausenciaescolar wherePRESENCADATA($value)
 * @mixin \Eloquent
 */
class ausenciaescolar extends Model
{
    protected $table      = 'JOGADORES_PRESENCA';
    protected $fillable   = [
         'PRESENCA_DATA'
        ,'ID_JOGADOR'
        ,'FLAG_DISPENSA'
        ,'FLAG_ATRASO'
        ,'ID_MOTIVO_AUSENCIA_ESCOLAR'
        ,'FALTA_OBSERVACAO'];

    protected $primaryKey = 'ID_PRESENCA';

    public $timestamps = false;

    public static $rules = array(
    );

    // campos de relacionamento
    public function categoria(){
        return $this->belongsTo(Categorias::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }

    // motivo de atendimento
    public function motivo_ausencia() {
        return $this->belongsTo(motivoAusenciaEscolar::class, 'ID_MOTIVO_AUSENCIA', 'ID_MOTIVO_AUSENCIA');
    }

    // jogadores
    public function jogador() {
        return $this->belongsTo(Jogadores::class, 'ID_JOGADOR', 'ID_JOGADOR');
    }
}
