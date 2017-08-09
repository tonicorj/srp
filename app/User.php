<?php

namespace SRP;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Illuminate\Support\Facades\Session;

/**
 * SRP\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;

    protected $table = 'users';
    protected $primaryKey = 'id';
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

    public function getPerfil()
    {
        $Ssql = 'select id_perfil from usuarios where id_usuario = ' . $this->id;
        $reg = DB::select($Ssql);
        $id_perfil = $reg[0]->id_perfil;

        return $id_perfil;
    }

    public function categoria_selecionada()
    {
        $c = Config::categoria_selecionada();
        return $c;
    }

    public static function categoria_descricao()
    {
        $config = new Config;
        return $config->categoria_descricao();
    }

    public static function categorias()
    {
        $config = new Config;
        return $config->categorias();
    }

    public static function altera_categoria($id_categoria)
    {
        Session::put('ID_CATEGORIA_ATUAL', $id_categoria);
        return self::categoria_descricao();
    }

    public static function cliente()
    {
        $sql = "select id_time from configura";
        $reg = DB::select($sql);
        //return dd($reg);
        return $reg[0]->id_time;
    }

    public static function skin(){
        $skin = "skin-red";

        $sql = "select id_time from configura";
        $reg = DB::select($sql);
        $id_cliente = $reg[0]->id_time;

        if ($id_cliente == 1) {
            $skin = "skin-black";
        }
        if ($id_cliente == 7) {
            $skin = "skin-green-light";
        }
        if ($id_cliente == 18) {
            $skin = "skin-blue";
        }
        if ($id_cliente == 21) {
            $skin = "skin-red";
        }
        return $skin;
    }
}
