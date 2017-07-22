<?php

namespace SRP\Http\Controllers\psicologia;

//use Illuminate\Http\Request;
use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\psicologia\atividadesRequest;
use SRP\Models\psicologia\atividades;

use DB;

class atividadesController extends Controller
{
    private $atividades;

    public function __construct(atividades $atividades) {
        $this->atividades = $atividades;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atividades = atividades::query()
            ->orderBy('ATIV_PSICOLOGIA_DESCR', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_atividade') );

        return view('psicologia.atividadesAdm.index')
            ->with('atividades', $atividades )
            ->with('titulos', $titulos)
            ;
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql  = "select A.ID_ATIV_PSICOLOGIA, A.ATIV_PSICOLOGIA_DESCR ";
        $_sql .= "from ATIVIDADES_PSICOLOGIA A ";
        $_sql .= "order by ";
        $_sql .= "  A.ATIV_PSICOLOGIA_DESCR ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $_data['data'] = $teste;
        $_json = \Response::json($_data);
        return $_json;
        //return \Response::json($teste);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('psicologia.atividadesAdm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtividadesRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('ATIVIDADES_PSICOLOGIA');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ATIV_PSICOLOGIA'] = $id;

        $this->atividades->create($input);

        \Session::flash('message', trans( 'messages.conf_atendimentos_inc'));
        $url = $request->get('redirect_to', asset('psicologia/atividadesAdm'));
        return redirect()->to($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atividade = $this->atividades->find($id);
        return view ('psicologia.atividadesAdm.edit')
            ->with('atividade', $atividade);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(atividadesRequest $request, $id)
    {
        $this->atividades->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_atividades_alt'));
        $url = $request->get('redirect_to', asset('psicologia/atividadesAdm'));
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
        $this->atividades->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_atividades_exc'));
        return redirect()->to(asset('psicologia/atividadesAdm'));
    }
}
