<?php

namespace SRP\Http\Requests\ssocial;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class atividadesSSRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ATIVIDADES_SERVICO_SOCIAL');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ATIV_ASSIST_SOCIAL');
        $id = $reg ? $reg : NULL;

        return [
            'ATIV_ASSIST_SOCIAL_DESCR'   => "required|min:3|unique:atividades_assist_social,ATIV_ASSIST_SOCIAL_DESCR,$id,ID_ATIV_ASSIST_SOCIAL",
        ];
    }

    public function messages()
    {
        return [
            'ATIV_ASSIST_SOCIAL_DESCR.required' => trans('messages.crit_atividadeSS_required'),
            'ATIV_ASSIST_SOCIAL_DESCR.unique'   => trans('messages.crit_atividadeSS_unique'),
            'ATIV_ASSIST_SOCIAL_DESCR.min'      => trans('messages.crit_atividadeSS_min'),
        ];
    }
}
