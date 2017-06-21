<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class Motivo_Ausencia extends Model
{
    //
    protected $table      = 'motivo_ausencia';
    protected $fillable   = ['ID_MOTIVO_AUSENCIA', 'MOTIVO_AUSENCIA_DESCRICAO'];
    protected $primaryKey = 'ID_MOTIVO_AUSENCIA';

    public $timestamps = false;

    public static $customMessages = array(
        'required'=> 'Digite o campo :attribute.',
        'between' => 'O :attribute deve ter no minimo :min digitos'
    );

    public static $rules = array(
        'MOTIVO_AUSENCIA_DESCRICAO'    => 'required|min:3',
    );}
