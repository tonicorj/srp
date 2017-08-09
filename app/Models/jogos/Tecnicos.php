<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\jogos\Tecnicos
 *
 * @property int $ID_TECNICO
 * @property string $TECNICO_NOME
 * @property int $ID_JOGADOR
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Tecnicos whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Tecnicos whereIDTECNICO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Tecnicos whereTECNICONOME($value)
 * @mixin \Eloquent
 */
class Tecnicos extends Model
{
    protected $table      = 'TECNICO';
    protected $fillable   = ['ID_TECNICO', 'TECNICO_NOME'];
    protected $primaryKey = 'ID_TECNICO';

    public $timestamps = false;

    public static $rules = array(
        'TECNICO_NOME'   => 'required|min:3',
    );
}
