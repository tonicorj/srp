<?php

namespace SRP\Http\Requests\adm;

use Illuminate\Foundation\Http\FormRequest;

class AlojamentosRequest extends FormRequest
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
        $reg = $this->get('ID_ALOJAMENTO');
        $id = $reg ? $reg : NULL;

        return [
            'ALOJAMENTO_NOME'   => "required|min:3|unique:ALOJAMENTO,ALOJAMENTO_NOME,$id,ID_ALOJAMENTO",
        ];
    }

    public function messages()
    {
        return [
            'ALOJAMENTO_NOME.required'  => trans('messages.crit_alojamento_required'),
            'ALOJAMENTO_NOME.unique'    => trans('messages.crit_alojamento_unique'),
            'ALOJAMENTO_QTD_VAGAS.required' => trans('messages.crit_alojamento_vagas_unique')
        ];
    }

}
