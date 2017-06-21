<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondicaoGramadosTable extends Migration
{
    private $tabela = 'CONDICAO_GRAMADO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->integer('ID_CONDICAO_GRAMADO');
                $table->string('CONDICAO_GRAMADO', 100)->unique();
                $table->primary('ID_CONDICAO_GRAMADO');
                /*
                if(!Schema::hasColumn('ID_CONDICAO_GRAMADO'))
                    $table->increments('ID_CONDICAO_GRAMADO');
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

    }
}
