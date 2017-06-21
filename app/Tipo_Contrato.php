<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class Tipo_Contrato extends Model
{
    protected $table      = 'tipo_contrato';
    protected $fillable   = ['ID_TIPO_CONTRATO', 'TIPO_CONTRATO_DESCRICAO'];
    protected $primaryKey = 'ID_TIPO_CONTRATO';

    public $timestamps = false;

    public static $customMessages = array(
        'required'=> 'Digite o campo :attribute.',
        'between' => 'O :attribute deve ter no minimo :min digitos'
    );

    public static $rules = array(
        'TIPO_CONTRATO_DESCRICAO'   => 'required|min:3',
    );}
