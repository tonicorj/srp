<?php

namespace srpM\JogObservacao\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class jogobservacaoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('JOGADORES_EM_OBSERVACAO');
    }
}
