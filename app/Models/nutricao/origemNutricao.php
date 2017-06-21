<?php

namespace SRP\Models\nutricao;

use Illuminate\Database\Eloquent\Model;

class origemNutricao extends Model
{
    protected $table      = 'ORIGEM_NUTRICAO';
    protected $fillable   = ['ID_ORIGEM_NUTRICAO', 'ORIGEM_NUTRICAO_DESCRICAO'];
    protected $primaryKey = 'ID_ORIGEM_NUTRICAO';

    public $timestamps = false;

    public static $rules = array(
        'ORIGEM_NUTRICAO_DESCRICAO'   => 'required|min:3',
    );

}
