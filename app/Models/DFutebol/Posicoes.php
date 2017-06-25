<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;

class Posicoes extends Model
{
    protected $table      = 'posicao';
    protected $fillable   = ['POSICAO', 'POSICAO_DESCRICAO', 'POSICAO_ORDEM', 'POSICAO_CAMPO'];
    protected $primaryKey = 'POSICAO';
    protected $keyType    = 'string';

    public $timestamps = false;

    public static $rules = array(
        'POSICAO'           => 'max:5|min:2',
        'POSICAO_DESCRICAO' => 'required|min:5',
    );
}
