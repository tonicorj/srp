<?php

namespace SRP\Http\Requests\SSocial;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;
use Illuminate\Support\Facades\Auth;

class CursosExtrasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // testa se tem permissão
        return PerfilPermissao::AcessoAction('CURSOS_EXTRAS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'CURSO_DT_INICIO_S' => "required",
            'CURSO_DT_FINAL_S' => "required",
            'CURSO_NOME' => "required",
            ];
    }

    public function messages()
    {
        return [
            'CURSO_INICIO_S.required' => trans('messages.crit_curso_dt_inicio_required'),
            'CURSO_FINAL_S.required' => trans('messages.crit_curso_dt_final_required'),
            'CURSO_NOME.required' => trans('messages.crit_curso_nome_required'),
        ];
    }
}
