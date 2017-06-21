<?php

namespace SRP\Http\Requests\ADM;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class ocorrenciasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('OCORRENCIAS_JOGADORES');;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ID_JOGADOR'        => 'required',
            'OCORR_TIPO'        => 'required',
            'OCORR_DATA_S'      => 'required',
            'OCORR_DESCRICAO'   => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'ID_JOGADOR.required'   => trans('messages.crit_jogador_required'),
            'OCORR_TIPO.required'   => trans('messages.crit_ocorrenciatipo'),
            'OCORR_DATA_S.required' => trans('messages.crit_ocorrenciadata'),
            'OCORR_DESCRICAO.unique'=> trans('messages.crit_departamento_unique'),
        ];
    }
}
