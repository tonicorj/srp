<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampeonatosTable extends Migration
{
    private $tabela = 'cuidados';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create('campeonato', function (Blueprint $table) {
                $table->increments('id_campeonato');
                $table->string('camp_nome', 320);
                $table->string('camp_ano', 10);
                $table->integer('id_criterio_01');
                $table->integer('id_criterio_02');
                $table->integer('id_criterio_03');
                $table->integer('id_criterio_04');
                $table->integer('id_criterio_05');
                $table->integer('id_criterio_06');
                $table->integer('id_pontuacao');
                $table->integer('id_time_campeao');
                $table->integer('id_tive_vice');
                $table->integer('id_tipocamp');
                $table->integer('camp_num_rebaixa');
                $table->integer('camp_classif_1');
                $table->integer('camp_classif_2');
                $table->integer('id_tipocamp_1');
                $table->integer('id_tipocamp_2');
                $table->integer('id_categoria');
                $table->integer('tmp_partida');
                $table->dateTime('camp_data_inicial');
                $table->dateTime('camp_data_final');
                $table->dateTime('camp_data_inscricao');
                $table->timestamps();
                $table->primary('id_campeonato');
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
        //Schema::dropIfExists('campeonatos');
    }
}
