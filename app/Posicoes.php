<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class Posicoes extends Model
{
    protected $table      = 'posicao';
    protected $fillable   = ['POSICAO', 'POSICAO_DESCRICAO', 'POSICAO_ORDEM', 'POSICAO_CAMPO'];
    protected $primaryKey = 'POSICAO';
    protected $keyType    = 'string';

    public $timestamps = false;

    public static $customMessages = array(
        'required'=> 'Digite o campo :attribute.',
        'between' => 'O :attribute deve ter no minimo :min digitos'
    );

    public static $rules = array(
        'posicao'           => 'max:5|min:2',
        'posicao_descricao' => 'required|min:5',
    );
}
