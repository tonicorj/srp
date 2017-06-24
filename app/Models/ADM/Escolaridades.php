<?php

namespace SRP\Models\ADM;

use Illuminate\Database\Eloquent\Model;

class escolaridades extends Model
{
    protected $table      = 'ESCOLARIDADE';
    protected $fillable   = ['ESCOLARIDADE_DESCRICAO'];
    protected $primaryKey = 'ID_ESCOLARIDADE';

    public $timestamps = false;

    public static $rules = array(
        'ESCOLARIDADE_DESCRICAO'    => 'required|min:3:unique',
    );

}
