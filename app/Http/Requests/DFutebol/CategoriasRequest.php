<?php

namespace SRP\Http\Requests\DFutebol;

use Illuminate\Foundation\Http\FormRequest;

class CategoriasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reg = $this->get('ID_CATEGORIA');
        $id = $reg ? $reg : NULL;

        return [
            'CATEG_DESCRICAO'   => "required|min:3|unique:CATEGORIAS,CATEG_DESCRICAO,$id,ID_CATEGORIA",
        ];
    }

    public function messages()
    {
        return [
            'CATEG_DESCRICAO.required' => trans('messages.crit_cirurgia_required'),
            'CATEG_DESCRICAO.unique'   => trans('messages.crit_cirurgia_unique'),
        ];
    }

}
