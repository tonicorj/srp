<?php

namespace SRP\Http\Requests\ADM;

use Illuminate\Foundation\Http\FormRequest;

class PaisesRequest extends FormRequest
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
        $reg = $this->get('ID_PAIS');
        $id = $reg ? $reg : NULL;

        return [
            'PAIS_NOME'  => "required|min:3|unique:PAISES,PAIS_NOME,$id,ID_PAIS",
            'PAIS_SIGLA' => "required|min:3|unique:PAISES,PAIS_SIGLA,$id,ID_PAIS",
        ];
    }
    public function messages()
    {
        return [
            'PAIS_NOME.required'  => trans('messages.crit_paisnome_required'),
            'PAIS_NOME.unique'    => trans('messages.crit_paisnome_unique'),
            'PAIS_NOME.min'       => trans('messages.crit_paisnome_min'),
            'PAIS_SIGLA.required' => trans('messages.crit_paissigla_required'),
            'PAIS_SIGLA.unique'   => trans('messages.crit_paissigla_unique'),
            'PAIS_SIGLA.min'      => trans('messages.crit_paissigla_min'),
        ];
    }


}
