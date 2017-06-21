<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadePedagogicasTable extends Migration
{
    private $tabela = 'ATIVIDADES_PEDAGOGICAS';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->integer('ID_ATIV_PEDAGOGICA');
                $table->string('ATIV_PEDAGOGICA_DESCR', 100)->unique();

                $table->primary('ID_ATIV_PEDAGOGICA');
                /*
                if(!Schema::hasColumn('ID_ATIV_PEDAGOGICA'))
                    $table->increments('ID_ATIV_PEDAGOGICA');
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
