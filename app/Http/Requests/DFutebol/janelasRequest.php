<?php

namespace SRP\Http\Requests\DFutebol;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class janelasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('JANELAS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_JANELA');
        $id = $reg ? $reg : NULL;

        return [
            'JANELA_NOME'   => "required|min:3|unique:JANELAS,JANELA_NOME,$id,ID_JANELA",
        ];
    }

    public function messages()
    {
        return [
            'JANELA_NOME.required' => trans('messages.crit_janela_required'),
            'JANELA_NOME.unique'   => trans('messages.crit_janela_unique'),
            'JANELA_INICIO_S.required'  => trans('messages.crit_janela_inicio_required'),
            'JANELA_FINAL_S.required'   => trans('messages.crit_janela_final_required'),
        ];
    }
}
