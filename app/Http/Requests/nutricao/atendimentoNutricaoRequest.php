<?php

namespace SRP\Http\Requests\nutricao;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class atendimentoNutricaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ATENDIMENTO_NUTRICAO');;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ATENDIMENTO_DATA_S' => "required",
            'ID_ATIV_NUTRICAO' => "required",
            'ID_ORIGEM_NUTRICAO' => "required",
        ];
    }

    public function messages()
    {
        return [
            'ATENDIMENTO_DATA_S.required' => trans('messages.crit_visita_data_required'),
            'ID_ATIV_NUTRICAO.required' => trans('messages.crit_atividadeSS_required'),
            'ID_ORIGEM_NUTRICAO.required' => trans('messages.crit_origem_required'),
        ];
    }
}
