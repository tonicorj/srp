<?php

namespace SRP\Http\Requests\ssocial;
use Illuminate\Foundation\Http\FormRequest;

class atendimentoSS_gruposRequest extends FormRequest
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
            'VISITA_DATA_S'         => "required" ,
            'ID_ATIV_ASSIST_SOCIAL' => "required" ,
            'ID_ORIGEM_SERVSOCIAL'  => "required" ,
        ];

    }

    public function messages()
    {
        return [
            'VISITA_DATA_S.required'         => trans('messages.crit_visita_data_required'),
            'ID_ATIV_ASSIST_SOCIAL.required' => trans('messages.crit_atividadeSS_required'),
            'ID_ORIGEM_SERVSOCIAL.required'  => trans('messages.crit_origem_required'),
        ];
    }
}