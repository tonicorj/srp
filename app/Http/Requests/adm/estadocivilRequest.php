<?php

namespace SRP\Http\Requests\adm;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class estadocivilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ESTADOCIVIL');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ESTADOCIVIL');
        $id = $reg ? $reg : NULL;

        return [
            'ESTADOCIVIL_DESCRICAO'   => "required|min:3|unique:ESTADOCIVIL,ESTADOCIVIL_DESCRICAO,$id,ID_ESTADOCIVIL",
        ];
    }

    public function messages()
    {
        return [
            'ESTADOCIVIL_DESCRICAO.required' => trans('messages.crit_estadocivil_required'),
            'ESTADOCIVIL_DESCRICAO.unique'   => trans('messages.crit_estadocivil_unique'),
        ];
    }
}
