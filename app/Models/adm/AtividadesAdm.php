<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

class AtividadesAdm extends Model
{
    protected $table      = 'atividades';
    protected $fillable   = ['ID_ATIVIDADE', 'ATIVIDADE_DESCRICAO'];
    protected $primaryKey = 'ID_ATIVIDADE';

    public $timestamps = false;

    public static $rules = array(
        'ATIVIDADE_DESCRICAO'   => 'required|min:3',
    );
}
