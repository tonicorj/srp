<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJogadoresObservacaosTable extends Migration
{
    private $tabela = 'jogadores_em_observacao';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('id_jogador');
                $table->integer('id_time');
                $table->integer('id_pais');
                $table->integer('id_parceiro');
                $table->integer('id_cidade_natal');
                $table->string('jog_nome_apelido', 60);
                $table->string('jog_nome_completo', 120);
                $table->dateTime('jog_dt_nascimento');
                $table->string('jog_posicao', 8);
                $table->string('jog_cbf', 20);
                $table->float('jog_altura');
                $table->float('jog_peso');
                $table->integer('jog_num_pe');
                $table->string('uf_natal', 2);
                $table->dateTime('contrato_inicio');
                $table->dateTime('contrato_final');
                $table->dateTime('jog_dt_rescisao');
                $table->text('jog_observacao');
                $table->string('jog_num_contrato', 40);
                $table->string('jog_pe_principal', 1);
                $table->integer('jog_classificacao');
                $table->integer('id_time_dir_federativo');
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
        //Schema::dropIfExists('jogadores_observacaos');
    }
}
