<?php

namespace SRP\Http\Requests\DM;

use Illuminate\Foundation\Http\FormRequest;

class CirurgiasRequest extends FormRequest
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
        $reg = $this->get('ID_CIRURGIA');
        $id = $reg ? $reg : NULL;

        return [
            'CIRURGIA_NOME'   => "required|min:3|unique:CIRURGIAS,CIRURGIA_NOME,$id,ID_CIRURGIA",
        ];
    }
    public function messages()
    {
        return [
            'CIRURGIA_NOME.required' => trans('messages.crit_cirurgia_required'),
            'CIRURGIA_NOME.unique'   => trans('messages.crit_cirurgia_unique'),
        ];
    }

}
