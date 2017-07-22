<?php

namespace SRP\Http\Controllers\DM;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use SRP\Http\Controllers\Controller;
use SRP\Models\DM\Tipo_Lesao;
use SRP\Http\Requests\DM\Tipo_LesaoRequest;
use DB;

class Tipo_LesaoController extends Controller
{
    public function __construct(Tipo_Lesao $tipo_lesao) {
        $this->tipo_lesao = $tipo_lesao;
    }

    public function index()
    {
        $tipo_lesoes = Tipo_Lesao::query()
            ->orderBy('TIPO_LESAO_DESCRICAO', 'ASC')
            ->paginate(10);

        $titulos = array( trans('messages.tit_tipo_lesao') );

        return view('DM.tipo_lesao.index')
            ->with('tipo_lesoes', $tipo_lesoes)
            ->with('titulos', $titulos)
            ;
    }
    public function create()
    {

        return view('DM.tipo_lesao.create');
    }

    public function store(Tipo_LesaoRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $reg = DB::select('select max(ID_TIPO_LESAO) as id from TIPO_LESAO ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_TIPO_LESAO'] = $id;
        $this->tipo_lesao->create($input);

        \Session::flash('message', trans( 'messages.conf_tipo_lesao_inc'));
        $url = $request->get('redirect_to', asset('dm/tipo_lesao'));
        return redirect()->to($url);
    }

    public function show($id)
    {
        //
    }

    public function edit(Tipo_Lesao $tipo_lesao)
    {
        return view ('DM.tipo_lesao.edit')
            ->with('tipo_lesao', $tipo_lesao);
    }

    public function update(Tipo_LesaoRequest $request, $id )
    {
        $this->tipo_lesao->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_tipo_lesao_alt'));
        $url = $request->get('redirect_to', asset('dm/tipo_lesao'));
        return redirect()->to($url);
    }

    public function destroy($id)
    {
        $this->tipo_lesao->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_tipo_lesao_exc'));
        return redirect()->to(asset('dm/tipo_lesao'));
        //return redirect()->to(URL::previous());
    }
}
