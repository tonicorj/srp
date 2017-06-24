<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;
USE Illuminate\Support\Facades\Auth;
use DB;

class PerfilPermissao extends Model
{
    protected $table      = 'perfil_permissao';
    protected $fillable   = ['ID_PERFIL', 'ID_ACTION', 'NIVEL_ACESSO'];
    protected $primaryKey = ['ID_PERFIL', 'ID_ACTION'];

    public $timestamps = false;

    public static function AcessoAction( $actionName ) {
        // faz a pesquisa

        $perfil = Auth::user()->id;
        $action = AcaoCodigo($actionName);

        $_sql  = 'SELECT MIN( NIVEL_ACESSO ) AS NIVEL_ACESSO';
        $_sql .= ' FROM PERFIL_PERMISSAO ';
        $_sql .= ' WHERE ID_PERFIL = ' . $perfil;
        $_sql .= '   AND ID_ACTION = ' . $action;

        if ($action > 399) {
            return true;
        }
        else {
            $reg = DB::select($_sql);
            return ($reg[0]->NIVEL_ACESSO == 1);
        }
    }
}
