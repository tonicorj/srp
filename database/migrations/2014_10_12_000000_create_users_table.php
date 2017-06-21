<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('USUARIOS')) {
            Schema::create('USUARIOS', function (Blueprint $table) {
                $table->integer('id_usuario');
                $table->string('login_usuario', 100)->unique();
                $table->string('nome_usuario', 100)->unique();
                $table->string('mail_usuario', 100)->unique();
                $table->string('flag_ativo_usuario', 1);
                $table->string('flag_privilegiado_usuario', 1);
                $table->integer('id_perfil');
                $table->string('senha_auxiliar', 200);
                $table->integer('id_categoria_padrao');
                $table->integer('id_departamento');
            });
        }

        if (!Schema::hasColumn('USUARIOS', 'remember_token')) {
            Schema::table('USUARIOS', function(Blueprint $table)
            {
                $table->text('remember_token',100); //add o campo
            });
        }
        /*
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('users');
    }
}
