<?php

namespace SRP\Http\Requests\DFutebol;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class ParceirosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('PARCEIROS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_PARCEIRO');
        $id = $reg ? $reg : NULL;

        return [
            'PARCEIRO_NOME'   => "required|min:3|unique:PARCEIROS,PARCEIRO_NOME,$id,ID_PARCEIRO",
        ];
    }

    public function messages()
    {
        return [
            'PARCEIRO_NOME.required' => trans('messages.crit_parceiro_required'),
            'PARCEIRO_NOME.unique'   => trans('messages.crit_parceiro_unique'),
        ];
    }
}
