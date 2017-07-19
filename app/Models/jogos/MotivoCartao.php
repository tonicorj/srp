<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

class MotivoCartao extends Model
{
    protected $table      = 'MOTIVO_CARTAO';
    protected $fillable   = ['ID_MOTIVO_CARTAO', 'MOTIVO_CARTAO'];
    protected $primaryKey = 'ID_MOTIVO_CARTAO';

    public $timestamps = false;

    public static $rules = array(
        'MOTIVO_CARTAO'   => 'required|min:3',
    );

}
