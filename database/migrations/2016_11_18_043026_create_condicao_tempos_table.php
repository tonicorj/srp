<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondicaoTemposTable extends Migration
{
    private $tabela = 'CONDICAO_TEMPO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->integer('ID_CONDICAO_TEMPO');
                $table->string('CONDICAO_TEMPO', 100)->unique();

                $table->primary('ID_CONDICAO_TEMPO');
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
    }
}
