<?php

namespace SRP\Models\SSocial;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use SRP\Jogadores;

class eventosJogadores extends Model implements TableInterface
{
    protected $table = 'EVENTOS_JOGADORES';
    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array( '#'
        ,trans('messages.tit_jogador')
        );

        parent::__construct($attributes);
    }

    protected $fillable   = [
        'ID_EVENTO_JOGADOR'
        ,'ID_EVENTO'
        ,'ID_JOGADOR' ];

    protected $primaryKey = 'ID_EVENTO_JOGADOR';

    public $timestamps = false;

    public static $rules = array();

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
            case $this->titulos[0]:   return $this->ID_JOGADOR;
        }
    }

    // campos de relacionamento
    public function jogadores(){
        return $this->belongsTo(Jogadores::class, 'ID_JOGADOR', 'ID_JOGADOR');
    }
}
