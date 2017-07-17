<?php

namespace SRP\Http\Requests\DM;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class ProntuarioRequest extends FormRequest
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
              'DATA_PRONTUARIO_S' => 'required'
            , 'ID_MEDICO' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'DATA_PRONTUARIO_S.required' => trans('messages.crit_prontuario_data_required'),
            'ID_MEDICO.required' => trans('messages.crit_medico_required')
        ];
    }
}
