<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoLesaosTable extends Migration
{
    private $tabela = 'TIPO_LESAO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_TIPO_LESAO');
                $table->string('TIPO_LESAO_DESCRICAO', 100)->unique();

                $table->primary('ID_TIPO_LESAO');
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
        //Schema::dropIfExists('tipo_lesaos');
    }
}
