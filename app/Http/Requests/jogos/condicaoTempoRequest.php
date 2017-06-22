<?php

namespace SRP\Http\Requests\jogos;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class condicaoTempoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('CONDICAO_TEMPO');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_CONDICAO_TEMPO');
        $id = $reg ? $reg : NULL;

        return [
            'CONDICAO_TEMPO'   => "required|min:3|unique:CONDICAO_TEMPO,CONDICAO_TEMPO,$id,ID_CONDICAO_TEMPO",
        ];
    }

    public function messages()
    {
        return [
            'CONDICAO_TEMPO.required' => trans('messages.crit_condicaotempo_required'),
            'CONDICAO_TEMPO.unique'   => trans('messages.crit_condicaotempo_unique'),
        ];
    }
}
