<?php

namespace SRP\Models\ADM;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table      = 'cargo_comissao';
    protected $fillable   = ['ID_CARGO_COMISSAO', 'CARGO_COMISSAO'];
    protected $primaryKey = 'ID_CARGO_COMISSAO';

    public $timestamps = false;


    public static $rules = array(
        'CARGO_COMISSAO'   => 'required|min:3',
    );
}
