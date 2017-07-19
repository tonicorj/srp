<?php

namespace SRP\Http\Requests\jogos;

use SRP\PerfilPermissao;
use Illuminate\Foundation\Http\FormRequest;

class MotivoCartaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('MOTIVO_CARTAO');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_MOTIVO_CARTAO');
        $id = $reg ? $reg : NULL;

        return [
            'MOTIVO_CARTAO'   => "required|min:3|unique:MOTIVO_CARTAO,MOTIVO_CARTAO,$id,ID_MOTIVO_CARTAO",
        ];
    }

    public function messages()
    {
        return [
            'MOTIVO_CARTAO.required' => trans('messages.crit_motivocartao_required'),
            'MOTIVO_CARTAO.unique'   => trans('messages.crit_motivocartao_unique'),
        ];
    }

}
