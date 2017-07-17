<?php

namespace SRP\Models\DM;

use Illuminate\Database\Eloquent\Model;

class cuidados extends Model
{
    protected $table      = 'JOGADOR_CUIDADOS';
    protected $fillable   = ['ID_JOGADOR', 'DATA_INCLUSAO', 'ID_MEDICO', 'CUIDADO_OBS', 'TIPO_SANGUINEO'];
    protected $primaryKey = 'ID_JOGADOR';

    public $timestamps = false;

    private $titulos;
    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
            trans('messages.tit_jogador'),
            trans('messages.tit_cuidados'),
            trans('messages.tit_cuidados_data'),
            trans('messages.tit_cuidados_tiposanguineo')
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'ID_JOGADOR'   => 'required',
        'DATA_INCLUSAO' => 'required',
        'ID_MEDICO' => 'required',
    );
}
