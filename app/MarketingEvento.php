<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\MarketingEvento
 *
 * @property int $ID_MARKETING_EVENTO
 * @property string $MARKETING_EVENTO_DESCRICAO
 * @property string $MARKETING_EVENTO_DATA
 * @property int $ID_TIPO_ACAO
 * @property string $MARKETING_EVENTO_OBS
 * @method static \Illuminate\Database\Query\Builder|\SRP\MarketingEvento whereIDMARKETINGEVENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\MarketingEvento whereIDTIPOACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\MarketingEvento whereMARKETINGEVENTODATA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\MarketingEvento whereMARKETINGEVENTODESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\MarketingEvento whereMARKETINGEVENTOOBS($value)
 * @mixin \Eloquent
 */
class MarketingEvento extends Model
{
    protected $table      = 'MARKETING_EVENTO';
    protected $fillable   = ['ID_MARKETING_EVENTO', 'MARKETING_EVENTO_DESCRICAO', 'MARKETING_EVENTO_DATA', 'ID_TIPO_ACAO','MARKETING_EVENTO_OBS'];
    protected $primaryKey = 'ID_MARKETING_EVENTO';

    public $timestamps = false;

    public static $rules = array(
        'MARKETING_EVENTO_DESCRICAO'   => 'required|min:3',
    );}
