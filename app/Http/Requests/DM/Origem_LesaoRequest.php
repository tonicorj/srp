<?php

namespace SRP\Http\Requests\DM;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class Origem_LesaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ORIGEM_LESAO');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ORIGEM_LESAO');
        $id = $reg ? $reg : NULL;

        return [
            'ORIGEM_LESAO_DESCRICAO'   => "required|min:3|unique:ORIGEM_LESAO,ORIGEM_LESAO_DESCRICAO,$id,ID_ORIGEM_LESAO",
        ];
    }
}
