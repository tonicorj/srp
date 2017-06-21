<?php

namespace SRP\Http\Requests\DM;

use Illuminate\Foundation\Http\FormRequest;

class Parte_CorpoRequest extends FormRequest
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
        $reg = $this->get('ID_PARTE_CORPO');
        $id = $reg ? $reg : NULL;

        return [
            'PARTE_CORPO_DESCRICAO'   => "required|min:3|unique:PARTE_CORPO,PARTE_CORPO_DESCRICAO,$id,ID_PARTE_CORPO",
        ];
    }

    public function messages()
    {
        return [
            'PARTE_CORPO_DESCRICAO.required' => trans('messages.crit_parte_corpo_required'),
            'PARTE_CORPO_DESCRICAO.unique'   => trans('messages.crit_parte_corpo_unique'),
        ];
    }

}
