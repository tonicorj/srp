<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class Estadocivil extends Model
{
    //
    protected $table      = 'estadocivil';
    protected $fillable   = ['ID_ESTADOCIVIL', 'ESTADOCIVIL_DESCRICAO'];
    protected $primaryKey = 'ID_ESTADOCIVIL';

    public $timestamps = false;

    public static $customMessages = array(
        'required'=> 'Digite o campo :attribute.',
        'between' => 'O :attribute deve ter no minimo :min digitos'
    );

    public static $rules = array(
        'estadocivil_descricao'    => 'required|min:3:unique',
    );
}
