<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class MarketingEvento extends Model
{
    protected $table      = 'MARKETING_EVENTO';
    protected $fillable   = ['ID_MARKETING_EVENTO', 'MARKETING_EVENTO_DESCRICAO', 'MARKETING_EVENTO_DATA', 'ID_TIPO_ACAO','MARKETING_EVENTO_OBS'];
    protected $primaryKey = 'ID_MARKETING_EVENTO';

    public $timestamps = false;

    public static $rules = array(
        'MARKETING_EVENTO_DESCRICAO'   => 'required|min:3',
    );}
