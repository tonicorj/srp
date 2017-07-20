<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrigemLesaosTable extends Migration
{
    private $tabela = 'ORIGEM_LESAO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_ORIGEM_LESAO');
                $table->string('ORIGEM_LESAO_DESCRICAO', 100)->unique();

                $table->primary('ID_ORIGEM_LESAO');
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
        //Schema::dropIfExists('origem_lesaos');
    }
}
