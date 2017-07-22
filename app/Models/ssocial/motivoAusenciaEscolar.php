<?php
namespace SRP\Models\ssocial;
use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class motivoAusenciaEscolar extends Model implements TableInterface
{
    protected $table      = 'MOTIVO_AUSENCIA_ESCOLAR';
    protected $fillable   = ['MOTIVO_AUSENCIA_DESCRICAO', 'FLAG_AUSENCIA_ESCOLA', 'MOTIVO_AUSENCIA_LETRA'];
    protected $primaryKey = 'ID_MOTIVO_AUSENCIA_ESCOLAR';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
            trans('messages.tit_motivoausencia_descricao'),
            trans('messages.tit_motivoausencia_flag'),
            trans('messages.tit_motivoausencia_letra')
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'MOTIVO_AUSENCIA_DESCRICAO' => 'required|min:3',
        'MOTIVO_AUSENCIA_LETRA'     => 'required|max:1'
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
    {
        switch ($header){
            case $this->titulos[0]:   return $this->MOTIVO_AUSENCIA_DESCRICAO;
            case $this->titulos[1]:   return $this->FLAG_AUSENCIA_ESCOLA;
            case $this->titulos[2]:   return $this->MOTIVO_AUSENCIA_LETRA;
        }
    }
}
