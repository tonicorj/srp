<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class Contas extends Model
{
    protected $table      = 'CONTA';
    protected $fillable   = ['CONTA_ID', 'CONTA_NOME', 'TIPO_CONTA_ID', 'CONTA_NUMERO'];
    protected $primaryKey = 'CONTA_ID';

    public $timestamps = false;

    public static $rules = array(
        'CONTA_NOME'    => 'required|min:3',
        'TIPO_CONTA_ID' => 'required',
    );
}
