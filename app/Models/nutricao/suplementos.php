<?php

namespace SRP\Models\nutricao;

use Illuminate\Database\Eloquent\Model;

class suplementos extends Model
{
    protected $table      = 'SUPLEMENTO';
    protected $fillable   = ['ID_SUPLEMENTO'
        , 'SUPLEMENTO_DESCRICAO'
    ];
    protected $primaryKey = 'ID_SUPLEMENTO';

    public $timestamps = false;

    public static $rules = array(
        'SUPLEMENTO_DESCRICAO'   => 'required|min:3',
    );
}
