<?php

namespace SRP\Http\Controllers\DM;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\DM\Origem_LesaoRequest;
use SRP\Models\DM\Origem_Lesao;

use DB;
class Origem_LesaoController extends Controller
{
    private $origem_lesao;
    public function __construct(Origem_Lesao $origem_lesao) {
        $this->origem_lesao = $origem_lesao;
    }

    public function index()
    {
        $origens = Origem_Lesao::query()
            ->orderBy('ORIGEM_LESAO_DESCRICAO', 'ASC')
            ->get()
        ;

        $titulos = array( trans('messages.tit_origem_lesao') );

        return view('DM.origem_lesao.index')
            ->with('origem', $origens)
            ->with('titulos', $titulos)
            ;
    }

    public function create()
    {
        return view('DM.origem_lesao.create');
    }

    public function store(Origem_LesaoRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o código novo
        $reg = DB::select('select max(ID_ORIGEM_LESAO) as id from ORIGEM_LESAO ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_ORIGEM_LESAO'] = $id;
        $this->origem_lesao->create($input);

        \Session::flash('message', trans( 'messages.conf_origem_lesao_inc'));
        $url = $request->get('redirect_to', asset('DM.origem_lesao'));
        return redirect()->to($url);
    }

    public function show($id)
    {
        //
    }

    public function edit(Origem_Lesao $origem_lesao)
    {
        return view ('DM.origem_lesao.edit')
            ->with('origem_lesao', $origem_lesao);
    }

    public function update(Origem_LesaoRequest $request, $id )
    {
        $this->origem_lesao->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_origem_lesao_alt'));
        $url = $request->get('redirect_to', asset('DM.origem_lesao'));
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->origem_lesao->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_origem_lesao_exc'));
        return redirect()->to(URL::previous());
    }
}
