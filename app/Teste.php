<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{
    protected $table      = 'cidades';
    protected $fillable   = ['ID_CIDADE', 'CIDADE_NOME', 'UF', 'ID_PAIS'];
    protected $primaryKey = 'ID_CIDADE';

    public $timestamps = false;

    public static $customMessages = array(
        'required'=> 'Digite o campo :attribute.',
        'between' => 'O :attribute deve ter no minimo :min digitos'
    );

    public static $rules = array(
        'cidade_nome'   => 'required|min:3',
        'uf'            => 'max:2',
        'id_pais'       => 'required'
    );
}
