<?php

namespace SRP\Http\Requests\pedagogia;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class atividadesPedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ATIVIDADES_PEDAGOGIA');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ATIV_PEDAGOGICA');
        $id = $reg ? $reg : NULL;

        return [
            'ATIV_PEDAGOGICA_DESCR'   => "required|min:3|unique:ATIVIDADES_PEDAGOGICAS,ATIV_PEDAGOGICA_DESCR,$id,ID_ATIV_PEDAGOGICA",
        ];
    }

    public function messages()
    {
        return [
            'ATIV_PEDAGOGICA_DESCR.required' => trans('messages.crit_atividade_required'),
            'ATIV_PEDAGOGICA_DESCR.unique'   => trans('messages.crit_atividade_unique'),
            'ATIV_PEDAGOGICA_DESCR.min'      => trans('messages.crit_atividade_min'),
        ];
    }
}
