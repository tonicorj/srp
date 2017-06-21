<?php

namespace SRP\Models\nutricao;

use Illuminate\Database\Eloquent\Model;

class atividadesNutricao extends Model
{
    protected $table      = 'ATIVIDADES_NUTRICAO';
    protected $fillable   = ['ID_ATIV_NUTRICAO', 'ATIV_NUTRICAO_DESCR'];
    protected $primaryKey = 'ID_ATIV_NUTRICAO';

    public $timestamps = false;

    public static $rules = array(
        'ATIV_NUTRICAO_DESCR'   => 'required|min:3',
    );
}
