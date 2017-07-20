<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmCirurgiasTable extends Migration
{
    private $tabela = 'departamento_medico_cirurgia';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('id_dm_cirurgia');
                $table->integer('id_departamento_medico');
                $table->integer('id_cirurgia');
                $table->integer('id_medico');
                $table->dateTime('cirurgia_data');
                $table->string('cirurgia_local', 200);
                $table->text('cirurgia_laudo');
                $table->dateTime('cirurgia_data_solicitacao');
                $table->integer('id_medico_solicitacao');
                $table->string('medico_operacao', 100);
                $table->timestamps();
                $table->primary('id_dm_cirurgia');
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
        //Schema::dropIfExists('dm_cirurgias');
    }
}

