<?php

namespace SRP\Http\Requests\adm;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class motivoAusenciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('MOTIVO_AUSENCIA');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_MOTIVO_AUSENCIA');
        $id = $reg ? $reg : NULL;

        return [
            'MOTIVO_AUSENCIA_DESCRICAO'   => "required|min:3|unique:MOTIVO_AUSENCIA,MOTIVO_AUSENCIA_DESCRICAO,$id,ID_MOTIVO_AUSENCIA",
        ];
    }

    public function messages()
    {
        return [
            'MOTIVO_AUSENCIA_DESCRICAO.required' => trans('messages.crit_motivoausencia_required'),
            'MOTIVO_AUSENCIA_DESCRICAO.unique'   => trans('messages.crit_motivoausencia_unique'),
        ];
    }
}
