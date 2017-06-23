<?php

namespace SRP\Models\ADM;

use Illuminate\Database\Eloquent\Model;

class MotivoAusencia extends Model
{
    //
    protected $table      = 'motivo_ausencia';
    protected $fillable   = ['ID_MOTIVO_AUSENCIA', 'MOTIVO_AUSENCIA_DESCRICAO'];
    protected $primaryKey = 'ID_MOTIVO_AUSENCIA';

    public $timestamps = false;

    public static $rules = array(
        'MOTIVO_AUSENCIA_DESCRICAO'    => 'required|min:3',
    );}
