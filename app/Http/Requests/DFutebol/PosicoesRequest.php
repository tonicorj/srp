<?php

namespace SRP\Http\Requests\DFutebol;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class PosicoesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('POSICAO');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //$reg = $this->get('POSICAO');
        //$id = $reg ? $reg : NULL;

        return [
            //'POSICAO'   => "required|unique:POSICAO,POSICAO,$id,POSICAO",
            'POSICAO'   => "required",
            'POSICAO_DESCRICAO' => "required|min:3",
            'POSICAO_ORDEM' => "required",
            'POSICAO_CAMPO' => "required"
        ];
    }

    public function messages()
    {
        return [
            'POSICAO.required' => trans('messages.crit_posicao_required'),
            'POSICAO.unique'   => trans('messages.crit_posicao_unique'),
            'POSICAO_DESCRICAO.required'  => trans('messages.crit_posicao_descricao_required'),
            'POSICAO_ORDEM.required'   => trans('messages.crit_posicao_ordem_required'),
            'POSICAO_CAMPO.required'   => trans('messages.crit_posicao_campo_required'),
        ];
    }
}
