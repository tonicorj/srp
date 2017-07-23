<?php

namespace SRP\Http\Controllers\ssocial;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use SRP\Http\Controllers\Controller;

use DB;
use SRP\Models\DFutebol\Jogadores;
use SRP\Models\ssocial\eventosJogadores;

class EventosJogadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // pega o código do atendimento
        $id = Input::get('evento');

        // pega o nome do evento
        $reg = DB::select('select evento_titulo from eventos where id_evento = ' . $id);
        $nome = $reg[0]->evento_titulo;

        $eventos = DB::table('VS_EVENTOS_JOGADORES')
            ->orderBy('JOG_NOME_COMPLETO', 'ASC')
            ->where('ID_EVENTO', '=', $id)
            ->get()
        ;
        return view('ssocial.eventosjogadores.index')
            ->with('eventos', $eventos)
            ->with('evento', $id)
            ->with('evento_titulo', $nome)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $id_evento = $request->input('ID_EVENTO');
        $nome = $request->input('JOGADOR');

        $qry = Jogadores::select('ID_JOGADOR')
            ->where('JOG_NOME_COMPLETO', '=', $nome)
            ->pluck('ID_JOGADOR')
        ;
        $id_jogador = $qry[0];

        // teste se já existe este jogador neste evento
        $ev = eventosJogadores::where('ID_JOGADOR', '=', $id_jogador)->where('ID_EVENTO', '=', $id_evento)->count();

        if (  $ev == 0 ) {
            // define o código novo
            $id = BuscaProximoCodigo('EVENTOS_JOGADORES');

            // pega o próximo codigo
            if ($id != null){
                $sql = 'INSERT INTO EVENTOS_JOGADORES ( ID_EVENTO_JOGADOR, ID_EVENTO, ID_JOGADOR ) ' .
                    ' VALUES ' .
                    ' ( ' . $id .
                    ' , ' . $id_evento .
                    ' , ' . $id_jogador . ')';
            }
            else {
                $sql = 'INSERT INTO EVENTOS_JOGADORES ( ID_EVENTO, ID_JOGADOR ) ' .
                    ' VALUES ' .
                    ' ( ' . $id_evento .
                    ' , ' . $id_jogador . ')';
            };
            //return dd($sql);
            DB::statement($sql);
            \Session::flash('message', trans( 'messages.conf_jogador_inc'));
       }
       else {
           \Session::flash('message', trans( 'messages.conf_jogador_alt'));
       }

        //$url = route('eventosJogadores.index', ['evento' => $id_evento]);
        //return redirect()->to($url);
        return dd("create");
        return $id_jogador;
        */
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = eventosJogadores::find($id);

        if ( $evento != null ) {
            $evento->delete();

            \Session::flash('message', trans('messages.conf_jogador_exc'));
            $eventos = DB::table('VS_EVENTOS_JOGADORES')
                ->orderBy('JOG_NOME_COMPLETO', 'ASC')
                ->get();

            //$url = route('eventosJogadores.index', ['evento' => $evento]);
            //return redirect()->to($url);
        }
        return '';
    }

    public function inclusao(Request $request)
    {
        // pega os dados do parametro
        $id_evento = $request['ID_EVENTO'];
        $nome = $request['JOGADOR'];

        $qry = Jogadores::select('ID_JOGADOR')
            ->where('JOG_NOME_COMPLETO', '=', $nome)
            ->pluck('ID_JOGADOR')
        ;
        $id_jogador = $qry[0];

        // teste se já existe este jogador neste evento
        $ev = eventosJogadores::where('ID_JOGADOR', '=', $id_jogador)->where('ID_EVENTO', '=', $id_evento)->count();

        if (  $ev == 0 ) {
            // define o código novo
            $id = BuscaProximoCodigo('EVENTOS_JOGADORES');

            // pega o próximo codigo
            if ($id != null){
                $sql = 'INSERT INTO EVENTOS_JOGADORES ( ID_EVENTO_JOGADOR, ID_EVENTO, ID_JOGADOR ) ' .
                    ' VALUES ' .
                    ' ( ' . $id .
                    ' , ' . $id_evento .
                    ' , ' . $id_jogador . ')';
            }
            else {
                $sql = 'INSERT INTO EVENTOS_JOGADORES ( ID_EVENTO, ID_JOGADOR ) ' .
                    ' VALUES ' .
                    ' ( ' . $id_evento .
                    ' , ' . $id_jogador . ')';
            };
            //return dd($sql);
            DB::statement($sql);
            return $id_jogador;
        }
        else
            return "";

        //$url = route('eventosJogadores.index', ['evento' => $id_evento]);
        //return redirect()->to($url);
        //return dd("create");


    }

    public function exclusao($id){
        $evento = eventosJogadores::find($id);

        if ( $evento != null ) {
            $evento->delete();

            \Session::flash('message', trans('messages.conf_jogador_exc'));
            $eventos = DB::table('VS_EVENTOS_JOGADORES')
                ->orderBy('JOG_NOME_COMPLETO', 'ASC')
                ->get();

            //$url = route('eventosJogadores.index', ['evento' => $evento]);
            //return redirect()->to($url);
        }
        return '';
    }
}
