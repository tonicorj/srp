<?php

namespace SRP\Models\DM;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DM\Medicos
 *
 * @mixin \Eloquent
 */
class Medicos extends Model
{
    protected $table      = 'VW_MEDICOS';
    protected $fillable   = ['ID_USUARIO', 'NOME_USUARIO', 'FUNC_DOCUMENTO'];
    protected $primaryKey = 'ID_USUARIO';

    public $timestamps = false;
    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
            trans('messages.tit_medico'),
            trans('messages.tit_documento')
        );
        parent::__construct($attributes);
    }


    public static $rules = array(
    );

}
