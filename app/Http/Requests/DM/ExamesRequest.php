<?php

namespace SRP\Http\Requests\DM;

use Illuminate\Foundation\Http\FormRequest;

class ExamesRequest extends FormRequest
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
        $reg = $this->get('ID_EXAME');
        $id = $reg ? $reg : NULL;

        return [
            'EXAME_NOME'   => "required|min:3|unique:EXAME,EXAME_NOME,$id,ID_EXAME",
        ];
    }

    public function messages()
    {
        return [
            'EXAME_NOME.required' => trans('messages.crit_exame_required'),
            'EXAME_NOME.unique'   => trans('messages.crit_exame_unique'),
        ];
    }
}
