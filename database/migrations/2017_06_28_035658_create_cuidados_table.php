<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuidadosTable extends Migration
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
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('id_cuidado');
                $table->integer('id_jogador');
                $table->datetime('data_inclusao');
                $table->text('cuidado_obs');
                $table->char('tipo_sanguineo', 5 );
                $table->timestamps();
                $table->primary('id_cuidado');
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
        Schema::dropIfExists('cuidados');
    }
}
