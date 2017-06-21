<?php

namespace SRP\Http\Requests\DM;

use Illuminate\Foundation\Http\FormRequest;

class DepMedicoRequest extends FormRequest
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
            'ID_JOGADOR' => 'required'
            , 'DM_DATA_INICIO_S' => 'required'
            , 'ID_TIPO_LESAO' => 'required'
            , 'ID_ORIGEM_LESAO' => 'required'
            , 'ID_PARTE_CORPO' => 'required'
            , 'ID_MEDICO'   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ID_JOGADOR.required' => trans('messages.crit_jogador_required'),
            'DM_DATA_INICIO_S.required' => trans('messages.crit_depmedico_entrada_required'),
            'ID_TIPO_LESAO.required' => trans('messages.crit_tipo_lesao_required'),
            'ID_ORIGEM_LESAO.required' => trans('messages.crit_origem_lesao_required'),
            'ID_PARTE_CORPO.required' => trans('messages.crit_parte_corpo_required'),
            'ID_MEDICO.required' => trans('messages.crit_medico_required')
        ];
    }
}
