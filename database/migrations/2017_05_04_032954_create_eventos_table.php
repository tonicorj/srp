<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    private $tabela = 'eventos';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('id_evento');
                $table->dateTime('evento_data');
                $table->string('evento_titulo', 100);
                $table->string('evento_local', 100);
                $table->string('evento_externo', 1);
                $table->integer('id_categoria');
                $table->integer('id_departamento');
                $table->text('obs_evento');
                $table->timestamps();
                $table->primary('id_evento');
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
        //Schema::dropIfExists('eventos');
    }
}
