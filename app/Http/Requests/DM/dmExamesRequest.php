<?php

namespace SRP\Http\Requests\DM;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class dmExamesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('REGISTRO_DM');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'EXAME_DATA_S' => 'required'
            ,'ID_MEDICO' => 'required'
            ,'ID_EXAME' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'EXAME_DATA_S.required' => trans('messages.crit_dmexame_data_required'),
            'ID_EXAME.required'     => trans('messages.crit_dmacompanha_obs_required'),
            'ID_MEDICO.required'    => trans('messages.crit_medico_required')
        ];
    }
}
