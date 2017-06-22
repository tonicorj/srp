<?php

namespace SRP\Http\Controllers\financeiro;

use DB;
use Illuminate\Http\Request;
use SRP\Models\financeiro\tipoContas;
use SRP\Models\financeiro\Contas;
use Illuminate\Routing\Controller;
use SRP\Http\Requests\financeiro\contasRequest;

class contasController extends Controller
{
    private $conta;

    public function __construct(Contas $conta) {
        $this->conta = $conta;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contas = Contas::query()
            ->orderBy('CONTA_NOME', 'ASC')
            ->get();

        $titulos = array( '#'
            , trans('messages.tit_tipoconta')
            , trans('messages.tit_conta_num')
            , trans('messages.tit_conta_nome') );

        return view('financeiro.contas.index')
            ->with('contas', $contas)
            ->with('titulos', $titulos)
            ;
    }

    public function _json() {
        $_sql  = "select A.CONTA_ID, A.TIPO_CONTA_ID, A.CONTA_NOME, B.TIPO_CONTA_DESCRICAO, A.CONTA_NUMERO";
        $_sql .= " from CONTA A LEFT JOIN TIPO_CONTA B ON A.TIPO_CONTA_ID = B.TIPO_CONTA_ID ";
        $_sql .= " order by ";
        $_sql .= "  A.CONTA_NOME ";
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
        $tipoconta = tipoContas::orderBy('TIPO_CONTA_DESCRICAO', 'asc')->pluck('TIPO_CONTA_DESCRICAO', 'TIPO_CONTA_ID')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('financeiro.contas.create')
            ->with('tipoconta', $tipoconta);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(contasRequest $request)
    {
        $input = $request->all();
        $id = BuscaProximoCodigo('CONTAS');

        // pega o próximo codigo
        if ($id != null)
            $input['CONTA_ID'] = $id;

        $this->conta->create($input);

        \Session::flash('message', trans( 'messages.conf_conta_inc'));
        $url = $request->get('redirect_to', asset('financeiro/contas'));
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
        $conta = $this->conta->find($id);
        $tipoconta = tipoContas::orderBy('TIPO_CONTA_DESCRICAO', 'asc')->pluck('TIPO_CONTA_DESCRICAO', 'TIPO_CONTA_ID')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view ('financeiro.contas.edit')
            ->with('conta', $conta)
            ->with('tipoconta', $tipoconta)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(contasRequest $request, $id)
    {
        $this->conta->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_conta_alt'));
        $url = $request->get('redirect_to', asset('financeiro/contas'));
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
        $this->conta->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_conta_exc'));
        return redirect()->to(asset('financeiro/contas'));
    }


}
