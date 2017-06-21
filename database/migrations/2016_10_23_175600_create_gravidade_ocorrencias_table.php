<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGravidadeOcorrenciasTable extends Migration
{
    private $tabela = 'OCORRENCIA_GRAVIDADES';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_OCORRENCIA_GRAVIDADE');
                $table->string('OCORRENCIA_GRAVIDADE_DESCRICAO', 50);
                $table->timestamps();
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
        //Schema::dropIfExists('gravidade_ocorrencias');
    }
}
