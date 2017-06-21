<?php

namespace SRP\Http\Controllers;

use Illuminate\Http\Request;

use SRP\Http\Requests;
use SRP\JogadorFoto;
use DB;

class JogadorFotoController extends Controller
{
    private $foto;

    public function __construct(JogadorFoto $foto) {
        $this->foto = $foto;
    }

    public function foto($id) {

        // define o nome do arquivo da foto
        $nome = 'foto' . $id . '.jpg';
        $nome = 'fotos/' . $nome;

        if ( file_exists( asset($nome)) == false ) {
            $nome = 'foto.jpg';
        }

        return $nome;
    }
}
