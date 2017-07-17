<?php

namespace SRP\Http\Requests\DFutebol;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class JogadoresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('JOGADORES');;
    }

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
}
