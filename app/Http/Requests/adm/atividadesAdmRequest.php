<?php

namespace SRP\Http\Requests\adm;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class atividadesAdmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ATIVIDADES');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ATIVIDADE');
        $id = $reg ? $reg : NULL;

        return [
            'ATIVIDADE_DESCRICAO'   => "required|min:3|unique:ATIVIDADES,ATIVIDADE_DESCRICAO,$id,ID_ATIVIDADE",
        ];
    }

    public function messages()
    {
        return [
            'ATIVIDADE_DESCRICAO.required' => trans('messages.crit_atividadeadm_required'),
            'ATIVIDADE_DESCRICAO.unique'   => trans('messages.crit_atividadeadm_unique'),
        ];
    }
}
