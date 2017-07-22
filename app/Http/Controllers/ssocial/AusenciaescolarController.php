<?php

namespace SRP\Http\Controllers\ssocial;

use SRP\Http\Requests\ssocial\ausenciaescolarRequest;

use SRP\Models\DFutebol\Jogadores;
use SRP\Http\Controllers\Controller;
use SRP\Models\ssocial\ausenciaescolar;
use SRP\Models\ssocial\motivoAusenciaEscolar;

use DB;

class AusenciaescolarController extends Controller
{
    private $ausencia;


    public function __construct(ausenciaescolar $ausenciaescolar) {
        $this->ausencia = $ausenciaescolar;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ausencias = DB::table('VS_AUSENCIA_ESCOLAR')
            ->orderBy('PRESENCA_DATA', 'DESC')
            ->get();

        $titulos = array( '#'
        ,trans('messages.tit_ausencia_data')
        ,trans('messages.tit_jogador')
        ,trans('messages.tit_categoria')
        ,trans('messages.tit_escolanome')
        //,trans('messages.tit_escolaserie')
        //,trans('messages.tit_escolaturma')
        ,'D'    //trans('messages.tit_ausenciadispensa')
        ,'A'    //trans('messages.tit_ausenciaatraso')
        ,trans('messages.tit_motivoausencia_descricao')
        );

        return view('ssocial.ausenciaescolar.index')
            ->with('ausencias', $ausencias)
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
        $motivo = motivoAusenciaEscolar::orderBy('MOTIVO_AUSENCIA_DESCRICAO', 'asc')
            ->pluck('MOTIVO_AUSENCIA_DESCRICAO', 'ID_MOTIVO_AUSENCIA_ESCOLAR')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        $jog = new Jogadores;
        $jogadores = $jog->na_escola_combo();

        return view('ssocial.ausenciaescolar.create')
            ->with('motivo', $motivo)
            ->with('jogadores', $jogadores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ausenciaescolarRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('PRESENCA');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_PRESENCA'] = $id;

        $input['PRESENCA_DATA'] = data_to_sql($input['PRESENCA_DATA_S']);
        $this->ausencia->create($input);

        \Session::flash('message', trans( 'messages.conf_ausenciaescolar_inc'));
        $url = $request->get('redirect_to', asset('ssocial/ausenciaescolar'));
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
        $ausencia = $this->ausencia->find($id);
        $ausencia['PRESENCA_DATA_S'] = data_display($ausencia['PRESENCA_DATA']);

        $motivo = motivoAusenciaEscolar::orderBy('MOTIVO_AUSENCIA_DESCRICAO', 'asc')
            ->pluck('MOTIVO_AUSENCIA_DESCRICAO', 'ID_MOTIVO_AUSENCIA_ESCOLAR')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        $jog = new Jogadores;
        $jogadores = $jog->na_escola_combo();

        return view ('ssocial.ausenciaescolar.edit')
            ->with('jogadores', $jogadores)
            ->with('motivo'   , $motivo)
            ->with('ausencia' , $ausencia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ausenciaescolarRequest $request, $id)
    {
        $request['PRESENCA_DATA'] = data_to_sql($request['PRESENCA_DATA_S']);
        $this->ausencia->find($request['ID_PRESENCA'])->update($request->all());

        \Session::flash('message', trans( 'messages.conf_ausenciaescolar_alt'));
        $url = $request->get('redirect_to', asset('ssocial/ausenciaescolar'));
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
        $this->ausencia->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_ausenciaescolar_exc'));
        return redirect()->to(asset('ssocial/ausenciaescolar'));
    }
}
