<?php

namespace SRP\Http\Requests\DM;

use Illuminate\Foundation\Http\FormRequest;

class dmCirurgiasRequest extends FormRequest
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
            'CIRURGIA_DATA_SOLICITACAO_S'   => 'required'
            ,'ID_MEDICO'        => 'required'
            ,'ID_CIRURGIA'      => 'required'
        ];
    }

    public function messages()
    {
        return [
            'CIRURGIA_DATA_SOLICITACAO_S.required' => trans('messages.crit_dmcirurgia_data_required'),
            'ID_MEDICO.required'       => trans('messages.crit_medico_required'),
            'ID_CIRURGIA.required'     => trans('messages.crit_cirurgia_required')
        ];
    }
}
