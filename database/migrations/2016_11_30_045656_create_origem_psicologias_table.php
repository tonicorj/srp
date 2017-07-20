<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrigemPsicologiasTable extends Migration
{
    private $tabela = 'ORIGEM_PSICOLOGIA';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_ORIGEM_PSICOLOGIA');
                $table->string('ORIGEM_PSICOLOGIA_DESCRICAO', 100)->unique();

                $table->primary('ID_ORIGEM_PSICOLOGIA');
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
        //Schema::dropIfExists('origem_psicologias');
    }
}
