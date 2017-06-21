<?php

namespace SRP\Http\Controllers\SSocial;

use Illuminate\Http\Request;
use SRP\Http\Controllers\Controller;

use Illuminate\Support\Facades\URL;

use SRP\Http\Requests\SSocial\AtividadesSSRequest;
use SRP\Models\SSocial\AtividadesSS;

use DB;

class AtividadesSSController extends Controller
{
    private $atividade;

    public function __construct(AtividadesSS $atividades) {
        $this->atividade = $atividades;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atividades  = AtividadesSS::query()
            ->orderBy('ATIV_ASSIST_SOCIAL_DESCR', 'ASC')
            ->get();

        $titulos = array( '#'
            ,trans('messages.tit_motivoatendimento')
        );

        return view('SSocial.atividadesSS.index')
            ->with('atividades', $atividades)
            ->with('titulos', $titulos)
            ;
    }

    public function _json() {
        $_sql  = "select A.ID_ATIV_ASSIST_SOCIAL, A.ATIV_ASSIST_SOCIAL_DESCR ";
        $_sql .= "from ATIVIDADES_ASSIST_SOCIAL A ";
        $_sql .= "order by ";
        $_sql .= "  A.ATIV_ASSIST_SOCIAL_DESCR ";
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
        return view('SSocial.atividadesSS.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtividadesSSRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $reg = DB::select('select max(ID_ATIV_ASSIST_SOCIAL) as id from ATIVIDADES_ASSIST_SOCIAL ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_ATIV_ASSIST_SOCIAL'] = $id;

        $this->atividades->create($input);

        \Session::flash('message', trans( 'messages.conf_atendimentos_inc'));
        $url = $request->get('redirect_to', asset('SSocial.atividadesSS'));
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

        return view ('SSocial.atividadesSS.edit')
            ->with('atividades', $atividade);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtividadesSSRequest $request, $id)
    {
        $this->atividades->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_atendimentos_alt'));
        $url = $request->get('redirect_to', asset('SSocial.atividadesSS'));
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
        $this->atividade->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_atendimentos_exc'));
        return redirect()->to(URL::previous());
    }
}
