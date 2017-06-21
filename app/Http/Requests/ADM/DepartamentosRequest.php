<?php

namespace SRP\Http\Requests\ADM;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class DepartamentosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('DEPARTAMENTOS');;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_DEPARTAMENTO');
        $id = $reg ? $reg : NULL;

        return [
            'DEPARTAMENTO_DESCRICAO'   => "required|min:3|unique:DEPARTAMENTO,DEPARTAMENTO_DESCRICAO,$id,ID_DEPARTAMENTO",
        ];
    }

    public function messages()
    {
        return [
            'DEPARTAMENTO_DESCRICAO.required' => trans('messages.crit_departamento_required'),
            'DEPARTAMENTO_DESCRICAO.unique'   => trans('messages.crit_departamento_unique'),
        ];
    }
}
