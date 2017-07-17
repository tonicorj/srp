<?php

namespace SRP\Http\Requests\DM;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class cuidadosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('CUIDADOS_ESPECIAIS');
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
