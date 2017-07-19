<?php

namespace SRP\Http\Requests\jogos;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class TecnicosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('TECNICOS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_TECNICO');
        $id = $reg ? $reg : NULL;

        return [
            'TECNICO_NOME'   => "required|min:3|unique:TECNICO,TECNICO_NOME,$id,ID_TECNICO",
        ];
    }

    public function messages()
    {
        return [
            'TECNICO_NOME.required' => trans('messages.crit_tecnico_required'),
            'TECNICO_NOME.unique'   => trans('messages.crit_tecnico_unique'),
        ];
    }
}
