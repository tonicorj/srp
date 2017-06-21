<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration
{
    private $tabela = 'PROJETO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_PROJETO');
                $table->string('PROETO_NOME', 100)->unique();
                $table->float('PROJETO_VALOR');
                $table->dateTime('PROJETO_DATA_INICIO');
                $table->dateTime('PROJETO_DATA_FINAL');
                //$table->timestamps();

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
        //Schema::dropIfExists('projetos');
    }
}
