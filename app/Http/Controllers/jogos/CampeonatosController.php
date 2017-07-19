<?php

namespace SRP\Http\Controllers\jogos;

//use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use SRP\Models\DFutebol\Categorias;
use Illuminate\Support\Facades\Auth;
use SRP\Models\jogos\TipoCampeonato;
use SRP\Models\jogos\Campeonatos;
use SRP\Models\jogos\Pontuacao;
use SRP\Models\jogos\Criterios;
use SRP\Http\Requests\jogos\CampeonatosRequest;

class CampeonatosController extends Controller
{
    //
    public function index()
    {
        $id_categoria = Auth::user()->categoria_selecionada();

        $campeonatos = Campeonatos::query()
            ->where('ID_CATEGORIA', '=', $id_categoria)
            ->orderBy('CAMP_ANO', 'ASC')
            ->get();

        $titulos = array( '#'
        , trans('messages.tit_campeonato')
        , trans('messages.tit_camp_ano')
        , trans('messages.tit_categoria')
        );

        return view('jogos.campeonatos.index')
            ->with('campeonatos', $campeonatos)
            ->with('titulos', $titulos)
            ;
    }

    public function create()
    {
        $tipocamp   = TipoCampeonato::orderBy('TCAMP_DESCRICAO', 'asc')->pluck('TCAMP_DESCRICAO', 'ID_TIPOCAMP')->prepend(trans('messages.tit_selecioneopcao'), '');
        $pontuacao  = Pontuacao::orderBy('PONT_NOME', 'asc')->pluck('PONT_NOME', 'ID_PONTUACAO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $categorias = Categorias::orderBy('CATEG_DESCRICAO', 'asc')->pluck('CATEG_DESCRICAO', 'ID_CATEGORIA')->prepend(trans('messages.tit_selecioneopcao'), '');
        $criterios  = Criterios::orderBy('CRIT_DESCRICAO', 'asc')->pluck('CRIT_DESCRICAO', 'ID_CRITERIO')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('jogos.campeonatos.create')
            ->with('tipocamp', $tipocamp)
            ->with('pontuacao', $pontuacao)
            ->with('categorias', $categorias)
            ->with('criterios', $criterios)
            ;
    }

    public function store(CampeonatosRequest $request)
    {
        $input = $request->all();

        // define o codigo novo
        $id = BuscaProximoCodigo('CAMPEONATOS');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_CAMPEONATO'] = $id;
        Campeonatos::create($input);

        \Session::flash('message', trans('messages.conf_campeonato_inc'));
        $url = $request->get('redirect_to', asset('jogos/campeonatos'));
        return redirect()->to($url);
    }

    public function edit($id)
    {
        $tipocamp   = TipoCampeonato::orderBy('TCAMP_DESCRICAO', 'asc')->pluck('TCAMP_DESCRICAO', 'ID_TIPOCAMP')->prepend(trans('messages.tit_selecioneopcao'), '');
        $pontuacao  = Pontuacao::orderBy('PONT_NOME', 'asc')->pluck('PONT_NOME', 'ID_PONTUACAO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $categorias = Categorias::orderBy('CATEG_DESCRICAO', 'asc')->pluck('CATEG_DESCRICAO', 'ID_CATEGORIA')->prepend(trans('messages.tit_selecioneopcao'), '');
        $criterios  = Criterios::orderBy('CRIT_DESCRICAO', 'asc')->pluck('CRIT_DESCRICAO', 'ID_CRITERIO')->prepend(trans('messages.tit_selecioneopcao'), '');

        $campeonato = Campeonatos::where('ID_CAMPEONATO', $id)->get();
        return view ('jogos.campeonatos.edit')
            ->with('campeonato', $campeonato[0])
            ->with('tipocamp', $tipocamp)
            ->with('pontuacao', $pontuacao)
            ->with('categorias', $categorias)
            ->with('criterios', $criterios)
            ;
    }

    public function update(CampeonatosRequest $request, $id)
    {
        Campeonatos::find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_campeonato_alt'));
        $url = $request->get('redirect_to', asset('jogos/campeonatos'));
        return redirect()->to($url);
    }

    public function destroy($id)
    {
        Campeonatos::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_campeonato_exc'));
        return redirect()->to(asset('jogos/campeonatos'));
    }

}
