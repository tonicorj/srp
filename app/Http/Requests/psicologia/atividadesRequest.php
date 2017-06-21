<?php

namespace SRP\Http\Requests\psicologia;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class atividadesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ATIVIDADES_PSICOLOGIA');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ATIV_PSICOLOGIA');
        $id = $reg ? $reg : NULL;

        return [
            'ATIV_PSICOLOGIA_DESCR'   => "required|min:3|unique:ATIVIDADES_PSICOLOGIA,ATIV_PSICOLOGIA_DESCR,$id,ID_ATIV_PSICOLOGIA",
        ];
    }

    public function messages()
    {
        return [
            'ATIV_PSICOLOGIA_DESCR.required' => trans('messages.crit_atividade_required'),
            'ATIV_PSICOLOGIA_DESCR.unique'   => trans('messages.crit_atividade_unique'),
        ];
    }
}
