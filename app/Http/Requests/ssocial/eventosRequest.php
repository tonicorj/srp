<?php

namespace SRP\Http\Requests\ssocial;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class eventosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('EVENTOS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'EVENTO_DATA_S' => "required",
            'EVENTO_TITULO' => "required",
            'EVENTO_LOCAL' => "required",
            'ID_CATEGORIA' => "required",
            'ID_DEPARTAMENTO' => "required",
        ];
    }
}
