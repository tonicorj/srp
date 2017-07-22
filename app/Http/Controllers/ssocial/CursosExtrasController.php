<?php

namespace SRP\Http\Controllers\ssocial;

use Illuminate\Http\Request;
use SRP\Http\Controllers\Controller;
use SRP\Models\ssocial\CursosExtras;
use SRP\Http\Requests\ssocial\CursosExtrasRequest;

use DB;

class CursosExtrasController extends Controller
{
    private $cursoextra;

    public function __construct(CursosExtras $cursoextra) {
        $this->cursoextra = $cursoextra;
    }

    public function index()
    {
        $titulos = array( '#'
        ,trans('messages.tit_curso_nome')
        ,trans('messages.tit_curso_dt_inicial')
        ,trans('messages.tit_curso_dt_final')
        ,trans('messages.tit_curso_empresa')
        );

        $cursos = DB::table('VS_CURSOS_EXTRAS')
            ->get();

        return view('ssocial.cursosextras.index')
            ->with('cursos', $cursos)
            ->with('titulos', $titulos)
            ;
    }

    public function _json() {
        $_sql  = "select ";
        $_sql .= " CURSO_NOME ";
        $_sql .= ",CURSO_DT_INICIO_S";
        $_sql .= ",CURSO_DT_FINAL_S";
        $_sql .= ",CURSO_EMPRESA";
        $_sql .= ",ID_CURSO";
        $_sql .= " from VS_CURSOS_EXTRAS  ";
        $_sql .= " order by ";
        $_sql .= "  CURSO_DT_INICIO DESC, CURSO_NOME  ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $_data['data'] = $teste;
        $_json = \Response::json($_data);
        return $_json;
        //return \Response::json($teste);
    }

    public function create()
    {
        return view('ssocial.cursosextras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('CURSOS_EXTRAS');
        if ($id != null)
            $input['ID_CURSO'] = $id;

        //return dd($input);
        $input['CURSO_DT_INICIO'] = data_to_sql($input['CURSO_DT_INICIO_S']);
        $input['CURSO_DT_FINAL']  = data_to_sql($input['CURSO_DT_FINAL_S']);

        $this->cursoextra->create($input);

        \Session::flash('message', trans( 'messages.conf_curso_inc'));
        $url = $request->get('redirect_to', asset('ssocial/cursosextras'));
        return redirect()->to($url);
    }

    public function edit($id)
    {
        $cursoextra = $this->cursoextra->find($id);

        $cursoextra['CURSO_DT_INICIO_S'] = data_display($cursoextra['CURSO_DT_INICIO']);
        $cursoextra['CURSO_DT_FINAL_S']  = data_display($cursoextra['CURSO_DT_FINAL']);

        return view ('ssocial.cursosextras.edit')
            ->with('cursoextra', $cursoextra);
    }

    public function update($id, CursosExtrasRequest $request)
    {
        $request['CURSO_DT_INICIO'] = data_to_sql($request['CURSO_DT_INICIO_S']);
        $request['CURSO_DT_FINAL']  = data_to_sql($request['CURSO_DT_FINAL_S']);
        $this->cursoextra->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_curso_alt'));
        $url = $request->get('redirect_to', asset('ssocial/cursosextras'));
        return redirect()->to($url);
    }

    public function destroy($id)
    {
        $this->cursoextra->find($id)->delete();

        \Session::flash('message', trans( 'messages.conf_curso_exc'));
        return redirect()->to(asset('ssocial/cursosextras'));
    }

    public function busca(Request $request) {

        //palavra chave a ser buscado
        $palavraChave = $request->input('p_curso_nome');

        //busca por campo da tabela
        $query = CursosExtras::where('curso_nome', $palavraChave)->get()->count();

        if ($query === 0) {
            //retorna todos os dados
            $dados= CursosExtras::paginate(10);
        } elseif ($query > 0) {
            //retorna o resultado da busca
            $dados = CursosExtras::where('curso_nome', $palavraChave)->paginate(10);
            return view('minha_view', ['dados' => $dados]);
        }

        //por padrão todos os dados são retornados
        return view('ssocial.cursosextras.index', ['dados' => $dados]);
    }
}
