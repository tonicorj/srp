<?php

namespace SRP\Http\Requests\jogos;

use SRP\PerfilPermissao;
use Illuminate\Foundation\Http\FormRequest;

class CriteriosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('CRITERIOS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_CRITERIO');
        $id = $reg ? $reg : NULL;

        return [
            'CRIT_DESCRICAO'   => "required|min:3|unique:CRITERIO,CRIT_DESCRICAO,$id,ID_CRITERIO",
        ];
    }

    public function messages()
    {
        return [
            'CRIT_DESCRICAO.required' => trans('messages.crit_criterio_required'),
            'CRIT_DESCRICAO.unique'   => trans('messages.crit_criterio_unique'),
        ];
    }

}
