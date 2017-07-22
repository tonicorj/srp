<?php

namespace SRP\Http\Controllers\ssocial;

use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\ssocial\motivoAusenciaEscolarRequest;
use SRP\Models\ssocial\motivoAusenciaEscolar;

class MotivoAusenciaEscolarController extends Controller
{
    private $motivo;

    public function __construct(motivoAusenciaEscolar $motivo) {
        $this->motivo = $motivo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motivos = motivoAusenciaEscolar::query()
            ->orderBy('MOTIVO_AUSENCIA_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#',
            trans('messages.tit_motivoausencia_descricao'),
            trans('messages.tit_motivoausencia_letra')
        );

        return view('ssocial.motivoAusenciaEscolar.index')
            ->with('motivos', $motivos)
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
        return view('ssocial.motivoAusenciaEscolar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(motivoAusenciaEscolarRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('MOTIVO_AUSENCIA_ESCOLAR');

        //return dd($id);

        //$input['ID_MOTIVO_AUSENCIA_ESCOLAR'] = $id;

        // pega o próximo codigo
        if ($id != null)
            $input['ID_MOTIVO_AUSENCIA_ESCOLAR'] = $id;

        //return dd($input['ID_MOTIVO_AUSENCIA_ESCOLAR']);

        $this->motivo->create($input);

        \Session::flash('message', trans( 'messages.conf_motivoAusenciaEscolar_inc'));
        $url = $request->get('redirect_to', asset('ssocial.motivoAusenciaEscolar'));
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
        $motivo = motivoAusenciaEscolar::find($id);

        return view ('ssocial.motivoAusenciaEscolar.edit')
            ->with('motivo', $motivo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(motivoAusenciaEscolarRequest $request, $id)
    {
        $this->motivo->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_motivoAusenciaEscolar_alt'));
        $url = $request->get('redirect_to', asset('ssocial.motivoAusenciaEscolar'));
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
        //return dd($id);
        $this->motivo->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_motivoAusenciaEscolar_exc'));
        //return redirect()->to(URL::previous());
        return redirect()->to(asset('ssocial/motivoAusenciaEscolar'));
    }
}
