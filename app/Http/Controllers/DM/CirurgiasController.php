<?php

namespace SRP\Http\Controllers\DM;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\DM\CirurgiasRequest;
use SRP\Models\DM\Cirurgias;
use DB;

class CirurgiasController extends Controller
{
    public function __construct(Cirurgias $cirurgia) {
        $this->cirurgia = $cirurgia;
    }

    public function index()
    {
        $cirurgias = Cirurgias::query()
            ->orderBy('CIRURGIA_NOME', 'ASC')
            ->get();

        $titulos = array( trans('messages.tit_cirurgia') );

        return view('DM.cirurgias.index')
            ->with('cirurgias', $cirurgias)
            ->with('titulos', $titulos);
    }

    public function create()
    {
        return view('DM.cirurgias.create');
    }

    public function store(CirurgiasRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o código novo
        $id = BuscaProximoCodigo('CIRURGIAS');
        if ($id != null) {
            $input['ID_DM_CIRURGIA'] = $id;
        }

        $reg = DB::select('select max(ID_CIRURGIA) as id from CIRURGIAS ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_CIRURGIA'] = $id;
        $this->cirurgia->create($input);

        \Session::flash('message', trans( 'messages.conf_cirurgia_inc'));
        $url = $request->get('redirect_to', asset('DM.cirurgias'));
        return redirect()->to($url);
    }

    public function show($id)
    {
        //
    }

    public function edit(Cirurgias $cirurgia)
    {
        return view ('DM.cirurgias.edit')
            ->with('cirurgia', $cirurgia);
    }

    public function update(CirurgiasRequest $request, $id )
    {
        $this->cirurgia->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_cirurgia_alt'));
        $url = $request->get('redirect_to', asset('DM.cirurgias'));
        return redirect()->to($url);
    }

    public function destroy($id)
    {
        $this->cirurgia->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_cirurgia_exc'));
        return redirect()->to(URL::previous());
    }
}
