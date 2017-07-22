<?php

namespace SRP\Http\Controllers\DM;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\DM\Parte_CorpoRequest;

use DB;
use SRP\Models\DM\Parte_Corpo;

class Parte_CorpoController extends Controller
{
    private $parte_corpo;

    public function __construct(Parte_Corpo $parte_corpo) {
        $this->parte_corpo = $parte_corpo;
    }

    public function index()
    {
        $partes = DB::table('PARTE_CORPO')
            ->orderBy('PARTE_CORPO_DESCRICAO')
            ->get();

        //return dd($partes);

        $titulos = array( trans('messages.tit_parte_corpo') );

        return view('dm.parte_corpo.index')
            ->with('partes', $partes)
            ->with('titulos', $titulos)
            ;
    }

    public function create()
    {
        return view('dm.Parte_Corpo.create');
    }

    public function store(Parte_CorpoRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $reg = DB::select('select max(ID_PARTE_CORPO) as id from PARTE_CORPO ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_PARTE_CORPO'] = $id;
        $this->parte_corpo->create($input);

        \Session::flash('message', trans( 'messages.conf_parte_corpo_inc'));
        $url = $request->get('redirect_to', asset('dm/parte_corpo'));
        return redirect()->to($url);

    }

    public function edit(Parte_Corpo $parte_corpo)
    {
        return view ('dm.parte_corpo.edit')
            ->with('parte_corpo', $parte_corpo);
    }

    public function update(Parte_CorpoRequest $request, $id )
    {
        $this->parte_corpo->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_parte_corpo_alt'));
        $url = $request->get('redirect_to', asset('dm/parte_corpo'));
        return redirect()->to($url);
    }

    public function destroy($id)
    {
        $this->parte_corpo->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_parte_corpo_exc'));
        return redirect()->to(asset('dm/parte_corpo'));
    }
}
