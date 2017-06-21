<?php

namespace SRP\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class EscolaridadesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ESCOLARIDADES');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ESCOLARIDADE');
        $id = $reg ? $reg : NULL;

        return [
            'ESCOLARIDADE_DESCRICAO'   => "required|min:3|unique:ESCOLARIDADE_DESCRICAO,ESCOLARIDADE,$id,ID_ESCOLARIDADE",
        ];
    }

    public function messages()
    {
        return [
            'ESCOLARIDADE_DESCRICAO.required' => trans('messages.crit_escolaridade_required'),
            'ESCOLARIDADE_DESCRICAO.unique'   => trans('messages.crit_escolaridade_unique'),
        ];
    }
}
