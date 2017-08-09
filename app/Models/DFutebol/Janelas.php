<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DFutebol\Janelas
 *
 * @property int $ID_JANELA
 * @property string $JANELA_NOME
 * @property string $JANELA_INICIO
 * @property string $JANELA_FINAL
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Janelas whereIDJANELA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Janelas whereJANELAFINAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Janelas whereJANELAINICIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Janelas whereJANELANOME($value)
 * @mixin \Eloquent
 */
class Janelas extends Model
{
    protected $table      = 'JANELAS';
    protected $fillable   = ['ID_JANELA', 'JANELA_NOME', 'JANELA_INICIO', 'JANELA_FINAL'];
    protected $primaryKey = 'ID_JANELA';

    public $timestamps = false;

    public static $rules = array(
        'JANELA_NOME'   => 'required|min:3',
    );
}
