<?php

namespace SRP\Models\ssocial;

use Illuminate\Database\Eloquent\Model;
use SRP\Models\DFutebol\Jogadores;

/**
 * SRP\Models\ssocial\eventosJogadores
 *
 * @property int $ID_EVENTO_JOGADOR
 * @property int $ID_EVENTO
 * @property int $ID_JOGADOR
 * @property-read \SRP\Models\DFutebol\Jogadores $jogadores
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\eventosJogadores whereIDEVENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\eventosJogadores whereIDEVENTOJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\eventosJogadores whereIDJOGADOR($value)
 * @mixin \Eloquent
 */
class eventosJogadores extends Model
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

    // campos de relacionamento
    public function jogadores(){
        return $this->belongsTo(Jogadores::class, 'ID_JOGADOR', 'ID_JOGADOR');
    }
}
