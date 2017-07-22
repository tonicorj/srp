<?php

namespace SRP\Http\Controllers\adm;

use Illuminate\Http\Request;

use SRP\Http\Requests\ADM\AlojamentosRequest;
use SRP\Models\ADM\Alojamentos;
use SRP\Http\Controllers\Controller;


class AlojamentosController extends Controller
{
    private $alojamentos;

    public function __construct(Alojamentos $alojamentos) {
        $this->alojamentos = $alojamentos;
    }


    public function index() {
        $alojamentos = Alojamentos::query()
            ->orderBy('ALOJAMENTO_NOME', 'ASC')
            ->paginate(10);

        return view('adm.alojamentos.index')
            ->with('alojamentos', $alojamentos);
    }

    public function create() {

        return view('adm.alojamentos.create');
    }

    public function store(AlojamentosRequest $request) {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('ALOJAMENTO');
        if ($id != null) {
            $input['ID_ALOJAMENTO'] = $id;
        }

        $this->alojamentos->create($input);

        \Session::flash('message', trans('messages.conf_alojamento_inc'));
        $url = $request->get('redirect_to', asset('adm/alojamentos'));
        return redirect()->to($url);
    }

    public  function edit($id) {
        $alojamentos = $this->alojamentos->find($id);
        return view ('adm.alojamentos.edit')
            ->with('alojamentos', $alojamentos);
    }

    public function update(AlojamentosRequest $request, $id) {
        $this->alojamentos->find($id)->update($request->all());

        \Session::flash('message', trans('messages.conf_alojamento_alt'));
        $url = $request->get('redirect_to', asset('adm/alojamentos'));
        return redirect()->to($url);
    }

    public function destroy($id) {
        $this->alojamentos->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_alojamento_exc'));
        $url = $request->get('redirect_to', asset('adm/alojamentos'));
        return redirect()->to($url);
    }
}
