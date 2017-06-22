<?php

namespace SRP\Models\financeiro;

use Illuminate\Database\Eloquent\Model;
use SRP\Models\financeiro\tipoContas;

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

    public function tipo_conta(){
        return $this->belongsTo(tipoContas::class, 'TIPO_CONTA_ID', 'TIPO_CONTA_ID');
    }

}
