<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadesPsicologiasTable extends Migration
{
    private $tabela = 'ATIVIDADES_PSICOLOGIA';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->integer('ID_ATIV_PSICOLOGIA');
                $table->string('ATIV_PSICOLOGIA_DESCR', 100)->unique();

                $table->primary('ID_ATIV_PSICOLOGIA');
                /*
                if(!Schema::hasColumn('ID_ATIV_PSICOLOGIA'))
                    $table->increments('ID_ATIV_PSICOLOGIA');
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
