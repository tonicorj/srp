<?php

namespace SRP\Http\Requests\jogos;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class EstadiosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('ESTADIO');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_ESTADIO');
        $id = $reg ? $reg : NULL;

        return [
            'ESTADIO_NOME'   => "required|min:3|unique:ESTADIO,ESTADIO_NOME,$id,ID_ESTADIO",
        ];
    }
    public function messages()
    {
        return [
            'ESTADIO_NOME.required'     => trans('messages.crit_estadio_required'),
            'ESTADIO_NOME.unique'       => trans('messages.crit_estadio_unique'),
        ];
    }
}
