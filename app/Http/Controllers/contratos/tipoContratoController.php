<?php

namespace SRP\Http\Controllers\contratos;

use Illuminate\Http\Request;

//use SRP\Http\Requests\Tipo_ContratoRequest;
use SRP\Models\contratos\tipoContrato;
use Illuminate\Routing\Controller;


class tipoContratoController extends Controller
{
    public function index() {
        $tipos = tipoContrato::query()
            ->orderBy('TIPO_CONTRATO_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_tipoContrato') );

        return view('contratos.tipocontrato.index')
            ->with('tipos', $tipos)
            ->with('titulos', $titulos)
            ;
    }

    public function create() {
    }

    public function store(Request $request) {
    }

    public  function edit($id) {
    }

    public function update($id, Request $request) {
    }

    public function destroy($id) {
    }
}
