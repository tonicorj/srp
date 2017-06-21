<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PerfilPermissao extends Migration
{
    private $tabela = 'PERFIL_PERMISSAO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->integer('ID_PERFIL');
                $table->integer('ID_ACTION');
                $table->integer('NIVEL_ACESSO');

                $table->primary(array( 'ID_PERFIL', 'ID_ACTION'));
                /*
                if(!Schema::hasColumn('ID_PERFIL_PERMISSAO'))
                    $table->increments('ID_TIPO_CONTRATO');
                */
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
