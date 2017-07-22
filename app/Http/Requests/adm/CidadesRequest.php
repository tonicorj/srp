<?php

namespace SRP\Http\Requests\adm;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class CidadesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('CIDADES');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'CIDADE_NOME'   => "required|min:3",
            'ID_PAIS'       => "required",
        ];
    }

    public function messages()
    {
        return [
            'CIDADE_NOME.required' => trans('messages.crit_cidade_required'),
            'ID_PAIS.required'     => trans('messages.crit_pais_required'),
            'CIDADE_NOME.min'      => trans('messages.crit_cidade_min'),
        ];
    }

}
