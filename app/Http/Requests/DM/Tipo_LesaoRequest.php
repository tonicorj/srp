<?php

namespace SRP\Http\Requests\DM;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class Tipo_LesaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('TIPO_LESAO');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_TIPO_LESAO');
        $id = $reg ? $reg : NULL;

        return [
            'TIPO_LESAO_DESCRICAO'   => "required|min:3|unique:TIPO_LESAO,TIPO_LESAO_DESCRICAO,$id,ID_TIPO_LESAO",
        ];
    }

    public function messages()
    {
        return [
            'TIPO_LESAO_DESCRICAO.required' => trans('messages.crit_tipo_lesao_required'),
            'TIPO_LESAO_DESCRICAO.unique'   => trans('messages.crit_tipo_lesao_unique'),
        ];
    }

}
