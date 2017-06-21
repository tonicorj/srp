<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class Janelas extends Model
{
    protected $table      = 'JANELAS';
    protected $fillable   = ['ID_JANELA', 'JANELA_NOME', 'JANELA_INICIO', 'JANELA_FINAL'];
    protected $primaryKey = 'ID_JANELA';

    public $timestamps = false;

    public static $rules = array(
        'JANELA_NOME'   => 'required|min:3',
    );
}
