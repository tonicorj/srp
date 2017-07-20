<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendimentoSSGruposTable extends Migration
{
    private $tabela = 'atendimento_assist_social';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('id_atend_assist_social');
                $table->dateTime('visita_data');
                $table->integer('id_jogador');
                $table->integer('id_ativ_assist_social');
                $table->integer('id_origem_servsocial');
                $table->integer('id_categoria');
                $table->text('obs_atividade');
                $table->string('nome_usuario', 100);
                $table->integer('id_usuario');
                $table->string('nome', 100);
                $table->timestamps();
                $table->primary('id_atend_assist_social');
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
        //
    }
}
