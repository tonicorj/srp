<?php

namespace SRP\Http\Requests\jogos;

use SRP\PerfilPermissao;
use Illuminate\Foundation\Http\FormRequest;

class TipoCampeonatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('TIPO_CAMPEONATO');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_TIPOCAMP');
        $id = $reg ? $reg : NULL;

        return [
            'TCAMP_DESCRICAO'   => "required|min:3|unique:TIPOCAMPEONATO,TCAMP_DESCRICAO,$id,ID_TIPOCAMP",
        ];
    }

    public function messages()
    {
        return [
            'TCAMP_DESCRICAO.required' => trans('messages.crit_tipocamp_required'),
            'TCAMP_DESCRICAO.unique'   => trans('messages.crit_tipocamp_unique'),
        ];
    }
}
