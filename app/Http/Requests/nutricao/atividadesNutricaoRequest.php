<?php

namespace SRP\Http\Requests\nutricao;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class atividadesNutricaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ATIVIDADES_NUTRICAO');;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ATIV_NUTRICAO');
        $id = $reg ? $reg : NULL;
        return [
            'ATIV_NUTRICAO_DESCR'   => "required|min:3|unique:ATIVIDADES_NUTRICAO,ATIV_NUTRICAO_DESCR,$id,ID_ATIV_NUTRICAO",
        ];
    }

    public function messages()
    {
        return [
            'ATIV_NUTRICAO_DESCR.required' => trans('messages.crit_atividade_required'),
            'ATIV_NUTRICAO_DESCR.unique'   => trans('messages.crit_atividade_unique'),
        ];
    }
}
