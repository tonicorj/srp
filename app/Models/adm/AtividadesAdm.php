<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\adm\AtividadesAdm
 *
 * @property int $ID_ATIVIDADE
 * @property string $ATIVIDADE_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\AtividadesAdm whereATIVIDADEDESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\AtividadesAdm whereIDATIVIDADE($value)
 * @mixin \Eloquent
 */
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
