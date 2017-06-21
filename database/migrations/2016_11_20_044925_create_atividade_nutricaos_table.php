<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadeNutricaosTable extends Migration
{
    private $tabela = 'ATIVIDADES_NUTRICAO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->integer('ID_ATIV_NUTRICAO');
                $table->string('ATIV_NUTRICAO_DESCR', 100)->unique();

                $table->primary('ID_ATIV_NUTRICAO');
                /*
                if(!Schema::hasColumn('ID_CONDICAO_TEMPO'))
                    $table->increments('ID_CONDICAO_TEMPO');
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
