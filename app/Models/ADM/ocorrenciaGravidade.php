<?php

namespace SRP\Models\ADM;

use Illuminate\Database\Eloquent\Model;

class ocorrenciaGravidade extends Model
{
    protected $table      = 'OCORRENCIA_GRAVIDADES';
    protected $fillable   = ['ID_OCORRENCIA_GRAVIDADE', 'OCORRENCIA_GRAVIDADE_DESCRICAO'];
    protected $primaryKey = 'ID_OCORRENCIA_GRAVIDADE';

    public $timestamps = false;

    public static $customMessages = array(
        'required'=> 'Digite o campo :attribute.',
        'between' => 'O :attribute deve ter no minimo :min digitos'
    );

    public static $rules = array(
        'OCORRENCIA_GRAVIDADE_DESCRICAO'    => 'required|min:3',
    );
}
