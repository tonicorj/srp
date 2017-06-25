<?php

namespace SRP\Http\Requests\jogos;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class tipoFaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('TIPO_FASE');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_TIPOFASE');
        $id = $reg ? $reg : NULL;

        return [
            'TFASE_DESCRICAO'   => "required|min:3|unique:TIPOFASE,TFASE_DESCRICAO,$id,ID_TIPOFASE",
        ];
    }

    public function messages()
    {
        return [
            'TFASE_DESCRICAO.required' => trans('messages.crit_tipofase_required'),
            'TFASE_DESCRICAO.unique'   => trans('messages.crit_tipofase_unique'),
        ];
    }
}
