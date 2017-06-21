<?php

namespace SRP\Http\Controllers;

//use Illuminate\Http\Request;
//use SRP\Models\DM\Cirurgias;
//use SRP\Models\DM\Origem_Lesao;

use Barryvdh\DomPDF\PDF;
use SRP\Models\SSocial\origemservsocial;

class PdfviewController extends Controller
{
    /**
     * @return $this
     */
    public function index()
    {
        //$data['model'] = $this->model->all();
        //return PDF::loadView('view', $data)->stream();

        //$model = origemservsocial::all();
        //return view('view' )->with('model', $model);

        //->with('model', $model)
        //return dd($model);

        $data['model'] = origemservsocial::all();
        //return dd($data);

        $pdf = PDF::loadView( 'view', $data);
        return $pdf->stream();

        //return PDF::loadView('view', $data)
        //    ->stream();

    }
}
