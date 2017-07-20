<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProntuariosTable extends Migration
{
    private $tabela = 'departamento_medico_prontuario';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('id_prontuario');
                $table->dateTime('data_prontuario');
                $table->integer('id_departamento_medico');
                $table->integer('id_medico');
                $table->text('txt_queixa_principal');
                $table->text('txt_historia_clinica');
                $table->text('txt_exame_fisico');
                $table->text('txt_suspeita');
                $table->text('txt_exames_complementares');
                $table->text('txt_diagnostico');
                $table->text('txt_tratamento');

                $table->timestamps();
                $table->primary('id_prontuario');
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
        //Schema::dropIfExists('prontuarios');
    }
}
