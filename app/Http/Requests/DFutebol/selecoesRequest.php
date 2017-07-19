<?php

namespace SRP\Http\Requests\DFutebol;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class selecoesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('SELECAO');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_SELECAO');
        $id = $reg ? $reg : NULL;

        return [
            'DESCRICAO_SELECAO'   => "required|min:3|unique:SELECAO,DESCRICAO_SELECAO,$id,ID_SELECAO",
        ];
    }

    public function messages()
    {
        return [
            'DESCRICAO_SELECAO.required' => trans('messages.crit_selecao_required'),
            'DESCRICAO_SELECAO.unique'   => trans('messages.crit_selecao_unique'),
        ];
    }
}
