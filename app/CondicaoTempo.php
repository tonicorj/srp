<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class CondicaoTempo extends Model
{
    protected $table      = 'CONDICAO_TEMPO';
    protected $fillable   = ['ID_CONDICAO_TEMPO', 'CONDICAO_TEMPO'];
    protected $primaryKey = 'ID_CONDICAO_TEMPO';

    public $timestamps = false;

    public static $customMessages = array(
        'required'=> 'Digite o campo :attribute.',
        'between' => 'O :attribute deve ter no minimo :min digitos'
    );

    public static $rules = array(
        'CONDICAO_TEMPO'   => 'required|min:3',
    );
}
