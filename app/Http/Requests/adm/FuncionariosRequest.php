<?php

namespace SRP\Http\Requests\adm;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;
class FuncionariosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('FUNCIONARIOS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_FUNCIONARIO');
        $id = $reg ? $reg : NULL;

        return [
            'NOME_USUARIO'      => "required|min:3|unique:VS_FUNCIONARIOS,NOME_USUARIO,$id,ID_USUARIO",
            'ID_DEPARTAMENTO'   => 'required',
            'ID_CARGO'          => 'required',
        ];
    }

    public function messages()
    {
        return [
            'NOME_USUARIO.required'     => trans('messages.crit_nome_funcionario_required'),
            'NOME_USUARIO.unique'       => trans('messages.crit_nome_funcionario_unique'),
            'ID_DEPARTAMENTO.required'  => trans('messages.crit_departamento_required'),
            'ID_CARGO.required'         => trans('messages.crit_cargo_required'),
        ];
    }

}
