<?php

namespace SRP\Models\pedagogia;

use Illuminate\Database\Eloquent\Model;

class origemPed extends Model
{
    protected $table      = 'ORIGEM_PEDAGOGIA';
    protected $fillable   = ['ID_ORIGEM_PEDAGOGIA', 'ORIGEM_PEDAGOGIA_DESCRICAO'];
    protected $primaryKey = 'ID_ORIGEM_PEDAGOGIA';

    public $timestamps = false;

    public static $rules = array(
        'ORIGEM_PEDAGOGIA_DESCRICAO'   => 'required|min:3',
    );
}
