<?php

namespace SRP\Http\Requests\ssocial;
use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class atendimentoSSRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ATENDIMENTO_SS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'VISITA_DATA_S'         => "required" ,
            'ID_ATIV_ASSIST_SOCIAL' => "required" ,
            'ID_ORIGEM_SERVSOCIAL'  => "required" ,
            'ID_JOGADOR'            => "required" ,
        ];
    }

    public function messages()
    {
        return [
            'VISITA_DATA_S.required'         => trans('messages.crit_visita_data_required'),
            'ID_ATIV_ASSIST_SOCIAL.required' => trans('messages.crit_atividadeSS_required'),
            'ID_ORIGEM_SERVSOCIAL.required'  => trans('messages.crit_origem_required'),
            'ID_JOGADOR.required'            => trans('messages.crit_jogador_required'),
        ];
    }
}
