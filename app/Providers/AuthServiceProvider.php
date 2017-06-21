<?php

namespace SRP\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use DB;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'SRP\Model' => 'SRP\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // cr�tica de acesso por action
        Gate::define('acesso', function ($user, $action){

            // define a action
            $id_action = AcaoCodigo($action);

            // novas actions
            if ($id_action  >= 290) {
                return true;
            }

            if ($id_action  == 0) {
                return false;
            }

            $Ssql = 'SELECT NIVEL_ACESSO ' .
                ' FROM PERFIL_PERMISSAO ' .
                ' WHERE ID_PERFIL = ' . Auth::user()->getPerfil() .
                '   AND ID_ACTION = ' . $id_action .
                ' -- ' . $action;
            $reg = DB::select($Ssql);

            if ( isset($reg[0]->NIVEL_ACESSO) )
            {  return ($reg[0]->NIVEL_ACESSO == 1); }
            else
            { abort(403, $Ssql); }
        });

        Gate::define('previlegiado', function($user){
           $Ssql = 'SELECT FLAG_PREVILEGIADO_USUARIO FROM USUARIOS ' .
               ' WHERE ID_USUARIO = ' . Auth::user()->id;
            $reg = DB::select($Ssql);

            if ($reg[0]->FLAG_PREVILEGIADO_USUARIO == 'S') {
                return true;
            }
            else {
                return false;
            }
        });
    }
}
