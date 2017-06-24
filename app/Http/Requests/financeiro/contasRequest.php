<?php

namespace SRP\Http\Requests\financeiro;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class contasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('CONTAS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('CONTA_ID');
        $id = $reg ? $reg : NULL;

        return [
            'CONTA_NOME'    => "required|min:3|unique:CONTA,CONTA_NOME,$id,CONTA_ID",
            'TIPO_CONTA_ID' => "required"
        ];
    }

    public function messages()
    {
        return [
            'CONTA_NOME.required' => trans('messages.crit_conta_required'),
            'CONTA_NOME.unique'   => trans('messages.crit_conta_unique'),
            'ID_TIPO_CONTA.required' => trans('messages.crit_tipoconta_required'),

        ];
    }
}
