<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class TipoAcao extends Model
{
    protected $table      = 'TIPO_ACAO_MARKETING';
    protected $fillable   = ['ID_TIPO_ACAO_MARKETING', 'TIPO_ACAO_MARKETING_DESCRICAO'];
    protected $primaryKey = 'ID_TIPO_ACAO_MARKETING';

    public $timestamps = false;

    public static $rules = array(
        'TIPO_ACAO_MARKETING_DESCRICAO'   => 'required|min:3',
    );
}
