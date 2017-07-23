<?php

namespace SRP\Http\Requests\psicologia;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class origemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ORIGEM_PSICOLOGIA');;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ORIGEM_PSICOLOGIA');
        $id = $reg ? $reg : NULL;

        return [
            'ORIGEM_PSICOLOGIA_DESCRICAO'   => "required|min:3|unique:ORIGEM_PSICOLOGIA,ORIGEM_PSICOLOGIA_DESCRICAO,$id,ID_ORIGEM_PSICOLOGIA",
        ];
    }

    public function messages()
    {
        return [
            'ORIGEM_PSICOLOGIA_DESCRICAO.required'  => trans('messages.crit_origem_required'),
            'ORIGEM_PSICOLOGIA_DESCRICAO.unique'    => trans('messages.crit_origem_unique'),
            'ORIGEM_PSICOLOGIA_DESCRICAO.min'       => trans('messages.crit_origem_min'),
        ];
    }
}
