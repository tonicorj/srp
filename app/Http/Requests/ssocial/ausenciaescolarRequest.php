<?php

namespace SRP\Http\Requests\ssocial;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class ausenciaescolarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('AUSENCIA_ESCOLAR');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'PRESENCA_DATA_S'   => "required",
            'ID_JOGADOR'    => "required",
        ];
    }

    public function messages()
    {
        return [
            'PRESENCA_DATA_S.required'  => trans('messages.crit_ausenciaescolar_data_required'),
            'ID_JOGADOR.required'       => trans('messages.crit_jogador_required'),
        ];
    }
}
