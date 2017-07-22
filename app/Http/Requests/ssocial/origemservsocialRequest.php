<?php

namespace SRP\Http\Requests\ssocial;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class origemservsocialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ORIGEM_SERVSOCIAL');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ORIGEM_SERVSOCIAL');
        $id = $reg ? $reg : NULL;

        return [
            'ORIGEM_SERVSOCIAL_DESCRICAO'   => "required|min:3|unique:ORIGEM_SERVSOCIAL,ORIGEM_SERVSOCIAL_DESCRICAO,$id,ID_ORIGEM_SERVSOCIAL",
        ];
    }

    public function messages()
    {
        return [
            'ORIGEM_SERVSOCIAL_DESCRICAO.required' => trans('messages.crit_origem_required'),
            'ORIGEM_SERVSOCIAL_DESCRICAO.unique'   => trans('messages.crit_origem_unique'),
            'ORIGEM_SERVSOCIAL_DESCRICAO.min'      => trans('messages.crit_origem_min'),
        ];
    }
}
