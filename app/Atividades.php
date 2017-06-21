<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class Atividades extends Model
{
    protected $table      = 'atividades';
    protected $fillable   = ['ID_ATIVIDADE', 'ATIVIDADE_DESCRICAO'];
    protected $primaryKey = 'ID_ATIVIDADE';

    public $timestamps = false;

    public static $customMessages = array(
        'required'=> 'Digite o campo :attribute.',
        'between' => 'O :attribute deve ter no minimo :min digitos'
    );

    public static $rules = array(
        'ATIVIDADE_DESCRICAO'   => 'required|min:3',
    );
}
