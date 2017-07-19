<?php

namespace SRP\Http\Requests\jogos;

use Illuminate\Foundation\Http\FormRequest;
use SRP\PerfilPermissao;

class CampeonatosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return PerfilPermissao::AcessoAction('CAMPEONATOS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'CAMP_ANO'      => "required|min:4",
            'ID_CATEGORIA'  => "required",
            'ID_TIPOCAMP'   => "required",
        ];
    }
    public function messages()
    {
        return [
            'CAMP_ANO.required'     => trans('messages.crit_camp_ano_required'),
            'CAMP_ANO.unique'       => trans('messages.crit_camp_ano_unique'),
            'ID_CATEGORIA.required' => trans('messages.crit_categoria_required'),
            'ID_TIPOCAMP.required'  => trans('messages.crit_tipocamp_required'),
        ];
    }

}
