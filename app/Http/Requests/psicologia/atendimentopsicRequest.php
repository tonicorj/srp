<?php

namespace SRP\Http\Requests\psicologia;
use Illuminate\Foundation\Http\FormRequest;

class atendimentopsicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ATENDIMENTO_DATA_S'    => "required" ,
            'ID_ATIV_PSICOLOGIA'    => "required" ,
            'ID_ORIGEM_PSICOLOGIA'  => "required" ,
            'ID_JOGADOR'            => "required" ,
        ];
    }

    public function messages()
    {
        return [
            'PSICOLOGIA_DATA_S.required'     => trans('messages.crit_visita_data_required'),
            'ID_ATIV_PSICOLOGIA.required'    => trans('messages.crit_atividadeSS_required'),
            'ID_ORIGEM_PSICOLOGIA.required'  => trans('messages.crit_origem_required'),
            'ID_JOGADOR.required'            => trans('messages.crit_jogador_required'),
        ];
    }
}
