<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciasTable extends Migration
{
    private $tabela = 'OCORRENCIAS';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_OCORRENCIAS');
                $table->integer('ID_TIPO_OCORRENCIA');
                $table->string('OCORRENCIA_TITULO', 100);
                $table->integer('OCORRENCIA_TIPO');
                $table->text('OCORRENCIA_OBS');
                $table->string('LOGIN_USUARIO', 100);

                $table->timestamps();
                $table->primary('ID_OCORRENCIAS');
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
        Schema::dropIfExists('ocorrencias');
    }
}
