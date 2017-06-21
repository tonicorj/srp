<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePontuacaosTable extends Migration
{
    private $tabela = 'PONTUACAO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_PONTUACAO');
                $table->string('PONT_NOME', 100)->unique();
                $table->integer('PONT_VITORIA');
                $table->integer('PONT_EMPATE');
                $table->integer('PONT_EMPATE0');
                $table->integer('PONT_VITORIA_PEN');
                $table->integer('PONT_DIF_GOLS');
                $table->integer('PONT_VIT_GOLS');

                //$table->timestamps();

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
        //Schema::dropIfExists('pontuacaos');
    }
}
