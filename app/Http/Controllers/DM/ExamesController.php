<?php

namespace SRP\Http\Controllers\DM;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\DM\ExamesRequest;
use SRP\Models\DM\Exames;

use DB;

class ExamesController extends Controller
{
    public $exame;

    public function __construct(Exames $exame) {
        $this->exame = $exame;
    }

    public function index()
    {
        $exames = Exames::query()
            ->orderBy('EXAME_NOME', 'ASC')
            ->get();

        $titulos = array( trans('messages.tit_exames') );

        return view('DM.exames.index')
            ->with('exames', $exames)
            ->with('titulos', $titulos)
            ;
    }

    public function create()
    {
        return view('DM.exames.create');
    }

    public function store(ExamesRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o código novo
        $reg = DB::select('select max(ID_EXAME) as id from EXAME ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_EXAME'] = $id;
        $this->exame->create($input);

        \Session::flash('message', trans( 'messages.conf_exame_inc'));
        $url = $request->get('redirect_to', asset('dm/exames'));
        return redirect()->to($url);
    }

    public function show($id)
    {
        //
    }

    public function edit(Exames $exame)
    {
        return view ('DM.exames.edit')
            ->with('exame', $exame);
    }

    public function update(ExamesRequest $request, $id )
    {
        $this->exame->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_exame_alt'));
        $url = $request->get('redirect_to', asset('dm/exames'));
        return redirect()->to($url);
    }

    public function destroy($id)
    {
        $this->exame->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_exame_exc'));
        return redirect()->to(asset('dm/exames'));
        //return redirect()->to(URL::previous());
    }
}
