<?php

namespace SRP\Http\Requests\pedagogia;
use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class atendimentospedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ATENDIMENTO_PEDAGOGIA');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'VISITA_DATA_S'       => "required" ,
            'ID_ATIV_PEDAGOGIA'   => "required" ,
            'ID_ORIGEM_PEDAGOGIA' => "required" ,
            'ID_JOGADOR'          => "required" ,
        ];
    }

    public function messages()
    {
        return [
            'VISITA_DATA_S.required'       => trans('messages.crit_visita_data_required'),
            'ID_ORIGEM_PEDAGOGIA.required' => trans('messages.crit_origem_required'),
            'ID_ATIV_PEDAGOGIA.required'   => trans('messages.crit_atividade_required'),
            'ID_JOGADOR.required'          => trans('messages.crit_jogador_required'),
        ];
    }
}
