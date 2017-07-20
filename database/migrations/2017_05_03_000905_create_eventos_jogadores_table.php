<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosJogadoresTable extends Migration
{
    private $tabela = 'eventos_jogadores';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('id_evento_jogador');
                $table->integer('id_evento');
                $table->integer('id_jogador');
                $table->timestamps();
                $table->primary('id_evento_jogador');
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
        //Schema::dropIfExists('eventos_jogadores');
    }
}
