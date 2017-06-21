<?php

namespace SRP;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable =
        ['id'
            ,'name'
            ,'email'
            ,'password'
            //,'created_at'
            //,'updated_at'
            //,'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        //'remember_token',
    ];

    /*
    public function getUserEmail($email){
        $user = new User();
        $emailTeste = self::all();
        foreach ($emailTeste as $key => $value) {
            if($value->mail_usuario == $email){
                return $value;
            }
        }
        return false;
    }

    public function getAuthPassword() {
        return $this->SENHA_AUXILIAR;
    }
    */

    public function getPerfil()
    {
        $Ssql = 'select id_perfil from usuarios where id_usuario = ' . $this->id;
        $reg = DB::select($Ssql);
        $id_perfil = $reg[0]->id_perfil;

        return $id_perfil;
    }
}
