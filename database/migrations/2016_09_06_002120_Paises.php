<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paises extends Migration
{
    private $tabela  = 'paises';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table){
                $table->increments('id_pais');
                $table->integer('id_continente');
                $table->string('pais_nome',40)->unique();
                $table->string('pais_sigla',3);
                $table->string('pais_nome_federacao',100);
                $table->timestamps();
                $table->primary('id_pais');
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
