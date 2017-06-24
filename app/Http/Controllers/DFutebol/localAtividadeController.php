<?php

namespace SRP\Http\Controllers\DFutebol;

use Illuminate\Http\Request;
use SRP\Http\Requests\DFutebol\localatividadeRequest;
use SRP\Models\DFutebol\LocalAtividade;
use Illuminate\Routing\Controller;


class localAtividadeController extends Controller
{
    private $local;

    public function __construct(LocalAtividade $local) {
        $this->local = $local;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $local = LocalAtividade::query()
            ->orderBy('LOCAL_ATIVIDADE_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_localatividade') );

        return view('DFutebol.localatividade.index')
            ->with('local', $local)
            ->with('titulos', $titulos)
            ;

        return view('DFutebol.localatividade.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DFutebol.localatividade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(localatividadeRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o codigo novo
        $id = BuscaProximoCodigo('LOCAL_ATIVIDADE');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_LOCAL_ATIVIDADE'] = $id;
        $this->local->create($input);

        \Session::flash('message', trans('messages.conf_localatividade_inc'));
        $url = $request->get('redirect_to', asset('DFutebol/localatividade'));
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
        $local = $this->local->find($id);

        return view ('DFutebol.localatividade.edit')
            ->with('local', $local);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(localatividadeRequest $request, $id)
    {
        $local = $this->local->find($id);
        return view ('DFutebol.localatividade.edit')
            ->with('local', $local)
            ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->local->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_localatividade_exc'));
        return redirect()->to(asset('DFutebol/localatividade'));
    }
}
