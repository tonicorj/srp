<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class TipoContas extends Model
{
    protected $table      = 'TIPO_CONTA';
    protected $fillable   = ['TIPO_CONTA_ID', 'TIPO_CONTA_DESCRICAO', 'TIPO_CONTA_TIPO', 'TIPO_CONTA_NUM', 'TIPO_CONTA_RECEBIMENTO'];
    protected $primaryKey = 'TIPO_CONTA_ID';

    public $timestamps = false;

    public static $rules = array(
        'TIPO_CONTA_DESCRICAO'   => 'required|min:3',
    );
}
