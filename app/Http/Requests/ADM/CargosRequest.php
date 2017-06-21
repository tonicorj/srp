<?php

namespace SRP\Http\Requests\ADM;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class CargosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('CARGOS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_CARGO_COMISSAO');
        $id = $reg ? $reg : NULL;

        return [
            'CARGO_COMISSAO'   => "required|min:3|unique:CARGO_COMISSAO,CARGO_COMISSAO,$id,ID_CARGO_COMISSAO",
        ];
    }

        public function messages()
    {
        return [
            'CARGO_COMISSAO.required' => trans('messages.crit_cargo_required'),
            'CARGO_COMISSAO.unique'   => trans('messages.crit_cargo_unique'),
        ];
    }
}
