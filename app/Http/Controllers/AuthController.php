<?php

namespace SRP\Http\Controllers;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use SRP\Http\Requests;

use Illuminate\Support\Facades\Input;

use Auth;
use SRP\User;
use Response;

class AuthController extends Controller
{
    //protected $redirectTo = '/template';

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function postLogin()
    {
        $input = Input::all();

        $email = $input['email'];
        $password = $input['password'];

        if (Auth::attempt(['mail_usuario' => $email, 'password' => $password])) {

            //return dd( Auth::user()->NOME_USUARIO);
            return view('jogadores');
        } else {
            return Response::json(['response' => "Registro n?o encontrado!"], 400);
        }
    }
}
