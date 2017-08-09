<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\adm\Funcionarios
 *
 * @property int $ID_USUARIO
 * @property string $LOGIN_USUARIO
 * @property string $SENHA_USUARIO
 * @property string $NOME_USUARIO
 * @property string $MAIL_USUARIO
 * @property int $FREQ_TROCA_SENHA_USUARIO
 * @property string $DT_ULTIMA_TROCA_SENHA_USUARIO
 * @property string $FLAG_ATIVO_USUARIO
 * @property string $FLAG_PREVILEGIADO_USUARIO
 * @property int $ID_PERFIL
 * @property string $SENHA_AUXILIAR
 * @property int $ID_CATEGORIA_PADRAO
 * @property string $USUARIO_SKIN
 * @property int $ID_DEPARTAMENTO
 * @property string $FUNC_DOCUMENTO
 * @property string $FUNC_CPF
 * @property string $FUNC_PASSAPORTE
 * @property string $FUNC_TELEFONE
 * @property string $FUNC_ENDERECO
 * @property string $DATA_NASCIMENTO
 * @property string $FUNC_DATA_ENTRADA
 * @property string $FUNC_DATA_SAIDA
 * @property int $ID_CARGO
 * @property float $FUNC_SALARIO_BASE
 * @property float $FUNC_SALARIO_EXTRA
 * @property float $FUNC_SALARIO_TOTAL
 * @property string $PASSAPORTE
 * @property string $DT_PASSAPORTE_VENC
 * @property string $FUNC_SMILES
 * @property string $FUNC_PASSAPORTE_VENC
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereDATANASCIMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereDTPASSAPORTEVENC($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereDTULTIMATROCASENHAUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFLAGATIVOUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFLAGPREVILEGIADOUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFREQTROCASENHAUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFUNCCPF($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFUNCDATAENTRADA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFUNCDATASAIDA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFUNCDOCUMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFUNCENDERECO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFUNCPASSAPORTE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFUNCPASSAPORTEVENC($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFUNCSALARIOBASE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFUNCSALARIOEXTRA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFUNCSALARIOTOTAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFUNCSMILES($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereFUNCTELEFONE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereIDCARGO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereIDCATEGORIAPADRAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereIDDEPARTAMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereIDPERFIL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereIDUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereLOGINUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereMAILUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereNOMEUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios wherePASSAPORTE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereSENHAAUXILIAR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereSENHAUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereUSUARIOSKIN($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Funcionarios whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
