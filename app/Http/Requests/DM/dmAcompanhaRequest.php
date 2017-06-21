<?php

namespace SRP\Http\Requests\DM;

use Illuminate\Foundation\Http\FormRequest;

class dmAcompanhaRequest extends FormRequest
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
              'ACOMPANHAMENTO_DATA_S' => 'required'
            , 'ID_MEDICO' => 'required'
            , 'ACOMPANHAMENTO_OBS' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ACOMPANHAMENTO_DATA_S.required' => trans('messages.crit_dmacompanha_data_required'),
            'ACOMPANHAMENTO_OBS.required' => trans('messages.crit_dmacompanha_obs_required'),
            'ID_MEDICO.required' => trans('messages.crit_medico_required')
        ];
    }
}
