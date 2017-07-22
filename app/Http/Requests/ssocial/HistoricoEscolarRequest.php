<?php

namespace SRP\Http\Requests\ssocial;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class HistoricoEscolarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('HISTORICO_ESCOLAR_SS');;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ESCOLA_NOME'   => "required" ,
            'ESCOLA_ANO'    => "required" ,
            'ESCOLA_SERIE'  => "required" ,
            //'ESCOLA_TURMA'  => "required" ,
            'ID_JOGADOR'    => "required" ,
        ];
    }

    public function messages()
    {
        return [
            'ESCOLA_NOME.required'  => trans('messages.crit_escola_nome_required'),
            'ESCOLA_ANO.required'   => trans('messages.crit_escola_ano_required'),
            'ESCOLA_SERIE.required' => trans('messages.crit_escola_serie_required'),
            //'ESCOLA_TURMA.required' => trans('messages.crit_escola_turma_required'),
            'ID_JOGADOR.required'   => trans('messages.crit_jogador_required'),
        ];
    }
}
