<?php

namespace SRP\Http\Controllers\ssocial;

use SRP\Http\Controllers\Controller;
use Illuminate\Http\Request;

use SRP\Models\adm\Departamentos;
use SRP\Models\dfutebol\Categorias;
use SRP\Models\ssocial\eventos;
use SRP\Http\Requests\ssocial\eventosRequest;
use DB;

class EventosController extends Controller
{

    private $evento;
    public function __construct(eventos $evento) {
        $this->evento = $evento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $request->has('f_titulo') ? session(['f_titulo' => $request->input('f_titulo')])  : session(['f_titulo' => '']);
        //return dd(session('f_titulo'));

        $filtro = function ($query) use($request) {
            if (!empty(session('f_titulo'))) {
                $query->where('EVENTO_TITULO', 'like', '%' . session('f_titulo') . '%');
            }
        };

        $titulos = array( '#'
            ,trans('messages.tit_evento_data')
            ,trans('messages.tit_evento_titulo')
            ,trans('messages.tit_evento_local')
            ,trans('messages.tit_categoria')
            ,trans('messages.tit_evento_depto')
            ,trans('messages.tit_evento_externo')
        );

        $eventos = DB::table('VS_EVENTOS')
            ->orderBy('EVENTO_DATA', 'DESC')
            ->get();

        //->where($filtro)

        return view('ssocial.eventos.index')
            ->with('eventos', $eventos)
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
        $departamentos = Departamentos::orderBy('DEPARTAMENTO_DESCRICAO', 'asc')
            ->pluck('DEPARTAMENTO_DESCRICAO', 'ID_DEPARTAMENTO')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        $categorias = Categorias::orderBy('CATEG_DESCRICAO', 'asc')
            ->pluck('CATEG_DESCRICAO', 'ID_CATEGORIA')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('ssocial.eventos.create')
            ->with('departamentos', $departamentos)
            ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(eventosRequest $request)
    {
        $input = $request->all();
        $input['EVENTO_DATA'] = data_to_sql($input['EVENTO_DATA_S']);

        // define o código novo
        $id = BuscaProximoCodigo('EVENTO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_EVENTO'] = $id;

        $this->evento->create($input);

        \Session::flash('message', trans( 'messages.conf_evento_inc'));
        $url = $request->get('redirect_to', asset('ssocial/eventos'));
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
        $evento = $this->evento->find($id);

        // monta o campo da data da visita
        $evento['EVENTO_DATA_S'] = data_display($evento['EVENTO_DATA']);

        $departamentos  = Departamentos::orderBy('DEPARTAMENTO_DESCRICAO', 'asc')->pluck('DEPARTAMENTO_DESCRICAO', 'ID_DEPARTAMENTO');
        $categorias     = Categorias::orderBy('CATEG_DESCRICAO', 'asc')->pluck('CATEG_DESCRICAO', 'ID_CATEGORIA');

        return view('ssocial.eventos.edit')
            ->with('evento', $evento)
            ->with('departamentos', $departamentos)
            ->with('categorias', $categorias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(eventosRequest $request, $id)
    {
        $request['EVENTO_DATA'] = data_to_sql($request['EVENTO_DATA_S']);
        $this->evento->find($request['ID_EVENTO'])->update($request->all());

        \Session::flash('message', trans( 'messages.conf_evento_alt'));
        $url = $request->get('redirect_to', asset('ssocial/eventos'));
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
        $sql = "select count(*) qtd from eventos_jogadores where id_evento = " . $id;
        $qtd = DB::select($sql);

        if ( $qtd > 0 ){
            \Session::flash('message', trans('messages.erro_eventos_jog'));
        }

        if ( $qtd == 0 ) {
            $this->evento->find($id)->delete();
            \Session::flash('message', trans('messages.conf_evento_exc'));
        }
        return redirect()->to(asset('ssocial/eventos'));
    }
}
