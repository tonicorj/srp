<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrigemNutricaosTable extends Migration
{
    private $tabela = 'ORIGEM_NUTRICAO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_ORIGEM_NUTRICAO');
                $table->string('ORIGEM_NUTRICAO_DESCRICAO', 100)->unique();

                $table->primary('ID_ORIGEM_NUTRICAO');
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
        //Schema::dropIfExists('origem_nutricaos');
    }
}
