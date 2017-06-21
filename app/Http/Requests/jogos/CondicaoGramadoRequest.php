<?php

namespace SRP\Http\Requests\jogos;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class CondicaoGramadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('CONDICAO_GRAMADO');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_CONDICAO_GRAMADO');
        $id = $reg ? $reg : NULL;

        return [
            'CONDICAO_GRAMADO'   => "required|min:3|unique:CONDICAO_GRAMADO,CONDICAO_GRAMADO,$id,ID_CONDICAO_GRAMADO",
        ];
    }

    public function messages()
    {
        return [
            'CONDICAO_GRAMADO.required' => trans('messages.crit_condicaogramado_required'),
            'CONDICAO_GRAMADO.unique'   => trans('messages.crit_condicaogramado_unique'),
        ];
    }
}
