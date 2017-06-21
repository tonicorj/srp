<?php

namespace SRP\Http\Requests\nutricao;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class origemNutricaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ORIGEM_NUTRICAO');;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ORIGEM_NUTRICAO');
        $id = $reg ? $reg : NULL;

        return [
            'ORIGEM_NUTRICAO_DESCRICAO'   => "required|min:3|unique:ORIGEM_NUTRICAO,ORIGEM_NUTRICAO_DESCRICAO,$id,ID_ORIGEM_NUTRICAO",
        ];
    }
    public function messages()
    {
        return [
            'ORIGEM_NUTRICAO_DESCRICAO.required' => trans('messages.crit_origem_required'),
            'ORIGEM_NUTRICAO_DESCRICAO.unique'   => trans('messages.crit_origem_unique'),
        ];
    }
}
