<?php

namespace SRP\Http\Requests\jogos;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;
class escoposRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ESCOPO');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ESCOPO');
        $id = $reg ? $reg : NULL;

        return [
            'ESCOPO_DESCRICAO'   => "required|min:3|unique:ESCOPO,ESCOPO_DESCRICAO,$id,ID_ESCOPO",
        ];
    }

    public function messages()
    {
        return [
            'ESCOPO_DESCRICAO.required' => trans('messages.crit_escopo_required'),
            'ESCOPO_DESCRICAO.unique'   => trans('messages.crit_escopo_unique'),
        ];
    }
}
