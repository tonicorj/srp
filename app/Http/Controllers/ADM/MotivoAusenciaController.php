<?php

namespace SRP\Http\Controllers\ADM;

use Illuminate\Routing\Controller;
use SRP\Models\ADM\MotivoAusencia;
use SRP\Http\Requests\ADM\motivoAusenciaRequest;

class MotivoAusenciaController extends Controller
{
    private $motivo;

    public function __construct(MotivoAusencia $motivo) {
        $this->motivo = $motivo;
    }

    public function index() {
        $motivos = MotivoAusencia::query()
            ->orderBy('MOTIVO_AUSENCIA_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#'
        , trans('messages.tit_motivoausencia_descricao')
        , trans('messages.tit_motivoausencia_letra')
        );

        return view('adm.motivoAusencia.index')
            ->with('motivos', $motivos)
            ->with('titulos', $titulos)
            ;
    }

    public function create() {
        return view('adm.motivoAusencia.create')
            ;
    }

    public function store(MotivoAusenciaRequest $request) {
        $input = $request->all();
        //return dd($input);

        // define o codigo novo
        $id = BuscaProximoCodigo('MOTIVO_AUSENCIA');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_MOTIVO_AUSENCIA'] = $id;
        $this->motivo->create($input);

        \Session::flash('message', trans('messages.conf_motivoAusencia_inc'));
        $url = $request->get('redirect_to', asset('adm/motivoAusencia'));
        return redirect()->to($url);
    }

    public  function edit($id) {
        $motivo = $this->motivo->find($id);
        return view ('adm.motivoAusencia.edit')
            ->with('motivo', $motivo);
    }

    public function update($id, motivoAusenciaRequest $request) {
        $this->motivo->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_motivoAusencia_alt'));
        $url = $request->get('redirect_to', asset('adm/motivoAusencia'));
        return redirect()->to($url);
    }

    public function destroy($id) {
        $this->motivo->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_motivoAusencia_exc'));
        return redirect()->to(asset('adm/motivoAusencia'));
    }
}
