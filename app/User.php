<?php

namespace SRP;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use SRP\Config;

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

}
