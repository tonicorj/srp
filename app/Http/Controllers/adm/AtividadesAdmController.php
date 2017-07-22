<?php

namespace SRP\Http\Controllers\adm;

use Illuminate\Routing\Controller;
use SRP\Http\Requests\ADM\atividadesAdmRequest;
use SRP\Models\ADM\AtividadesAdm;


class AtividadesAdmController extends Controller
{
    private $atividade;

    public function __construct(AtividadesAdm $atividade) {
        $this->atividade = $atividade;
    }

    public function index() {
        $atividades = AtividadesAdm::query()
            ->orderBy('ATIVIDADE_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_atividadeAdm') );

        return view('adm.atividadesAdm.index')
            ->with('atividades', $atividades)
            ->with('titulos', $titulos)
            ;
    }

    public function create() {
        //return "Funcionou!";
        return view('adm.atividadesAdm.create');
    }

    public function store( atividadesAdmRequest $request) {
        $input = $request->all();
        $id = BuscaProximoCodigo('ATIVIDADES');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ATIVIDADE'] = $id;
        $this->atividade->create($input);

        \Session::flash('message', trans('messages.conf_atividadesAdm_inc'));
        $url = $request->get('redirect_to', asset('adm/atividadesAdm'));
        return redirect()->to($url);
    }

    public  function edit($id) {
        $atividade = $this->atividade->find($id);

        return view ('adm.atividadesAdm.edit')
            ->with('atividade', $atividade);
    }

    public function update($id, atividadesAdmRequest $request) {
        $this->atividade->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_atividadesAdm_alt'));
        $url = $request->get('redirect_to', asset('adm/atividadesAdm'));
        return redirect()->to($url);
    }

    public function destroy($id) {
        $this->atividade->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_atividadesAdm_exc'));
        return redirect()->to(asset('adm/atividadesAdm'));
    }
}
