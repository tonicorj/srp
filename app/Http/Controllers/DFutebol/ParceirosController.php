<?php

namespace SRP\Http\Controllers\DFutebol;

use SRP\Http\Requests\DFutebol\ParceirosRequest;
use SRP\Models\DFutebol\Parceiros;
use Illuminate\Routing\Controller;

class ParceirosController extends Controller
{
    private $parceiros;

    public function __construct(Parceiros $parceiros) {
        $this->parceiros = $parceiros;
    }

    public function index() {

        $parceiros = Parceiros::query()
            ->orderBy('PARCEIRO_NOME', 'ASC')
            ->get()
        ;

        $titulos = array( '#'
            , trans('messages.tit_parceiro')
            , trans('messages.tit_parceiro_celular')
            , trans('messages.tit_parceiro_contato')
            , trans('messages.tit_parceiro_email')
        );

        return view('DFutebol.parceiros.index')
            ->with('parceiros', $parceiros)
            ->with('titulos', $titulos)
            ;
    }

    public function create() {
        //return "Funcionou!";
        return view('DFutebol.parceiros.create');
    }

    public function store(ParceirosRequest $request) {
        $input = $request->all();
        //return dd($input);

        // define o codigo novo
        $id = BuscaProximoCodigo('PARCEIROS');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_PARCEIRO'] = $id;
        $this->parceiros->create($input);

        \Session::flash('message', trans('messages.conf_parceiro_inc'));
        $url = $request->get('redirect_to', asset('DFutebol/parceiros'));
        return redirect()->to($url);
    }

    public  function edit($id) {
        $parceiro = Parceiros::find($id);
        return view ('DFutebol.parceiros.edit')
            ->with('parceiro', $parceiro)
            ;
    }

    public function update($id, ParceirosRequest $request) {
        Parceiros::find($id)->update($request->all());
        \Session::flash('message', trans( 'messages.conf_parceiros_alt'));
        $url = $request->get('redirect_to', asset('DFutebol/parceiros'));
        return redirect()->to($url);
    }

    public function destroy($id) {
        Parceiros::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_parceiros_exc'));
        return redirect()->to(asset('DFutebol/parceiros'));
    }
}
