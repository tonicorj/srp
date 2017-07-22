<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    protected $table      = 'usuarios';
    protected $fillable   = [
         'ID_USUARIO'
	    ,'LOGIN_USUARIO'
	    ,'SENHA_USUARIO'
	    ,'NOME_USUARIO'
        ,'MAIL_USUARIO'
	    ,'FREQ_TROCA_SENHA_USUARIO'
	    ,'DT_ULTIMA_TROCA_SENHA_USUARIO'
	    ,'FLAG_ATIVO_USUARIO'
	    ,'FLAG_PREVILEGIADO_USUARIO'
	    ,'ID_PERFIL'
	    ,'SENHA_AUXILIAR'
	    ,'ID_CATEGORIA_PADRAO'
	    ,'USUARIO_SKIN'
	    ,'ID_DEPARTAMENTO'
	    ,'FUNC_DOCUMENTO'
	    ,'FUNC_CPF'
	    ,'FUNC_PASSAPORTE'
	    ,'FUNC_TELEFONE'
	    ,'FUNC_ENDERECO'
	    ,'DATA_NASCIMENTO'
	    ,'FUNC_DATA_ENTRADA'
	    ,'FUNC_DATA_SAIDA'
	    ,'ID_CARGO'
	    ,'FUNC_SALARIO_BASE'
	    ,'FUNC_SALARIO_EXTRA'
	    ,'FUNC_SALARIO_TOTAL'
	    ,'DT_PASSAPORTE_VENC'
	    ,'created_at'
	    ,'updated_at'
    ];
    protected $primaryKey = 'ID_USUARIO';

    public $timestamps = false;

    public static $rules = array(
        'NOME_USUARIO'   => 'required|min:3',
    );
}
