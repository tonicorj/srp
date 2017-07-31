<?php

namespace SRP\Http\Requests\pedagogia;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class origemPedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ORIGEM_PEDAGOGIA');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ORIGEM_PEDAGOGIA');
        $id = $reg ? $reg : NULL;

        return [
            'ORIGEM_PEDAGOGIA_DESCRICAO'   => "required|min:3|unique:ORIGEM_PEDAGOGIA,ORIGEM_PEDAGOGIA_DESCRICAO,$id,ID_ORIGEM_PEDAGOGIA",
        ];
    }

    public function messages()
    {
        return [
            'ORIGEM_PEDAGOGIA_DESCRICAO.required'  => trans('messages.crit_origem_required'),
            'ORIGEM_PEDAGOGIA_DESCRICAO.unique'    => trans('messages.crit_origem_unique'),
            'ORIGEM_PEDAGOGIA_DESCRICAO.min'       => trans('messages.crit_origem_min'),
        ];
    }
}
