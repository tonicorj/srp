<?php

namespace SRP\Http\Requests\DFutebol;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class localatividadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('LOCAL_ATIVIDADE');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_LOCAL_ATIVIDADE');
        $id = $reg ? $reg : NULL;

        return [
            'LOCAL_ATIVIDADE_DESCRICAO'   => "required|min:3|unique:LOCAL_ATIVIDADE,LOCAL_ATIVIDADE_DESCRICAO,$id,ID_LOCAL_ATIVIDADE",
        ];
    }

    public function messages()
    {
        return [
            'LOCAL_ATIVIDADE_DESCRICAO.required' => trans('messages.crit_localatividade_required'),
            'LOCAL_ATIVIDADE_DESCRICAO.unique'   => trans('messages.crit_localatividade_unique'),
        ];
    }
}
