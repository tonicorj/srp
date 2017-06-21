<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class PeDominante extends Model
{
    protected $table      = 'PE_DOMINANTE';
    protected $fillable   = ['PE_DOMINANTE', 'PE_DOMINANTE_DESCRICAO'];
    protected $primaryKey = 'PE_DOMINANTE';

    public $timestamps = false;

    public static $rules = array(
        'PE_DOMINANTE'   => 'required',
        'PE_DOMINANTE_DESCRICAO'   => 'required|min:3',
    );
}
