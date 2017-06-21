<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    private $tabela  = 'CATEGORIAS';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_CATEGORIA')->unique();
                $table->string('CATEG_DESCRICAO',60);
                $table->integer('CATEG_IDADE_INI');
                $table->integer('CATEG_IDADE_FIN');
                $table->string('CATEG_COR',20);
                $table->integer('ID_TIME');
                $table->integer('CATEG_TEMPO_JOGO');
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
        //Schema::dropIfExists('categorias');
    }
}
