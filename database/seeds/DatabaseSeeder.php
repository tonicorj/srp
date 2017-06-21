<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use SRP\User;
use SRP\Funcionarios;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(TabelaUsuarioSeeder::class);

        $this->call(ParceirosSeeder::class);


        // Serviço Social
        $this->call(OrigemSSSeeder::class);
        $this->call(MotivoSSSeeder::class);

        /*
        $this->call(EstadocivilSeeder::class);
        $this->call(EscolaridadesSeeder::class);

        $this->call(PaisesSeeder::class);
        $this->call(Motivo_AusenciaSeeder::class);
        $this->call(GravidadeOcorrenciaSeeder::class);
        */
    }
}


class TabelaUsuarioSeeder extends Seeder {

    public function run()
    {
        $usuarios = User::get();

        /*
        if($usuarios->count() == 0) {
            User::create(array(
                'id'=>1,
                'email'=> 'tonico@oi.com.br',
                'password'=> Hash::make('sade'),
                'name'=> 'Tonico',
                //'flag_ativo_usuario'=> 'S',
                //'flag_previlegiado_usuario'=>'S',
                //'id_categoria_padrao'=> 1,
                //'id_perfil'=> 1
            ));
        }
        */

        if (!($usuario = User::find(1))) {
            /*
            User::create(array(
                'id'=>1,
                'email'=> 'tonico@globo.com',
                'password'=> Hash::make('sade'),
                'name'=> 'Tonico',
            ));
            */

            Funcionarios::create(array(
                'ID_USUARIO'                => 1
                ,'LOGIN_USUARIO'            => 'tonico'
                ,'SENHA_USUARIO'            => Hash::make('sade')
                ,'SENHA_AUXILIAR'           => Hash::make('sade')
                ,'NOME_USUARIO'             => 'Tonico'
                ,'MAIL_USUARIO'             => 'tonico@globo.com'
                ,'FREQ_TROCA_SENHA_USUARIO' => 3000
                ,'FLAG_ATIVO_USUARIO'       => 'S'
                ,'FLAG_PREVILEGIADO_USUARIO'=> 'S'
                ,'ID_PERFIL'                => 1
                ,'ID_CATEGORIA_PADRAO'      => 1
                /*
                ,'DT_ULTIMA_TROCA_SENHA_USUARIO'
                ,'USUARIO_SKIN'
                ,'ID_DEPARTAMENTO'
                ,'FUNC_DOCUMENTO'
                ,'FUNC_CPF'
                ,'FUNC_PASSAPORTE'
                ,'FUNC_TELEFONE'
                ,'FUNC_ENDERECO'
                ,'DATA_NASCIMENTO'
                ,'FUNC_DATA_ENTRADA'
                ,'FUNC_DATA_SAIDA'
                ,'ID_CARGO'
                ,'FUNC_SALARIO_BASE'
                ,'FUNC_SALARIO_EXTRA'
                ,'FUNC_SALARIO_TOTAL'
                ,'DT_PASSAPORTE_VENC'
                */
            ));
        }
        else {
            $usuario->password = Hash::make('sade');
            $usuario->update();
        };
    }

}