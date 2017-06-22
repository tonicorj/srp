<?php

namespace SRP\Http\Requests\financeiro;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class tipoContasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('TIPO_CONTAS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('TIPO_CONTA_ID');
        $id = $reg ? $reg : NULL;

        return [
            'TIPO_CONTA_DESCRICAO'  => "required|min:3|unique:TIPO_CONTA,TIPO_CONTA_DESCRICAO,$id,TIPO_CONTA_ID",
            'TIPO_CONTA_NUM'        => "required"
        ];
    }

    public function messages()
    {
        return [
            'TIPO_CONTA_DESCRICAO.required' => trans('messages.crit_tipoconta_required'),
            'TIPO_CONTA_DESCRICAO.unique'   => trans('messages.crit_tipoconta_unique'),
            'TIPO_CONTA_NUM.required'       => trans('messages.crit_tipoconta_num_required'),

        ];
    }
}
