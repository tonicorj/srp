<?php

namespace SRP\Models\ssocial;

use Illuminate\Database\Eloquent\Model;


class ausenciaescolar extends Model
{
    protected $table      = 'JOGADORES_PRESENCA';

    private $titulos;

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

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return $this->titulos;
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {  }

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
