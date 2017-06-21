<?php

namespace SRP\Http\Controllers\nutricao;

use SRP\Http\Controllers\Controller;
use SRP\Models\nutricao\atividadesNutricao;
use SRP\Http\Requests\nutricao\atividadesNutricaoRequest;

class atividadesNutricaoController extends Controller
{
    private $atividades;

    public function __construct(atividadesNutricao $atividades) {
        $this->atividades = $atividades;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atividades = atividadesNutricao::query()
            ->orderBy('ATIV_NUTRICAO_DESCR', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_atividade') );

        return view('nutricao.atividadesNutricao.index')
            ->with('atividades', $atividades )
            ->with('titulos', $titulos)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nutricao.atividadesNutricao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(atividadesNutricaoRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('ATIVIDADES_NUTRICAO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ATIV_NUTRICAO'] = $id;

        $this->atividades->create($input);

        \Session::flash('message', trans( 'messages.conf_atendimentos_inc'));
        $url = $request->get('redirect_to', asset('nutricao/atividadesNutricao'));
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
        return view ('nutricao.atividadesNutricao.edit')
            ->with('atividade', $atividade);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(atividadesNutricaoRequest $request, $id)
    {
        $this->atividades->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_atividades_alt'));
        $url = $request->get('redirect_to', asset('nutricao/atividadesNutricao'));
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
        return redirect()->to(asset('nutricao/atividadesNutricao'));
    }
}
