<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmExamesTable extends Migration
{
    private $tabela = 'departamento_medico_exame';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('id_dm_exame');
                $table->integer('id_departamento_medico');
                $table->integer('id_exame');
                $table->integer('id_medico');
                $table->dateTime('exame_data');
                $table->dateTime('exame_data_solicitacao');
                $table->text('exame_laudo');
                $table->timestamps();
                $table->primary('id_dm_exame');
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
        //Schema::dropIfExists('dm_exames');
    }
}
