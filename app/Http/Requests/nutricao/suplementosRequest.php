<?php

namespace SRP\Http\Requests\nutricao;

use SRP\PerfilPermissao;
use Illuminate\Foundation\Http\FormRequest;

class suplementosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('SUPLEMENTOS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_SUPLEMENTO');
        $id = $reg ? $reg : NULL;

        return [
            'SUPLEMENTO_DESCRICAO'   => "required|min:3|unique:SUPLEMENTO,SUPLEMENTO_DESCRICAO,$id,ID_SUPLEMENTO",
        ];
    }

    public function messages()
    {
        return [
            'SUPLEMENTO_DESCRICAO.required' => trans('messages.crit_suplemento_required'),
            'SUPLEMENTO_DESCRICAO.unique'   => trans('messages.crit_suplemento_unique'),
        ];
    }
}
