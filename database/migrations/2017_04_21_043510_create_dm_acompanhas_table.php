<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmAcompanhasTable extends Migration
{
    private $tabela = 'departamento_medico_acompanha';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('id_acompanhamento_dm');
                $table->integer('id_departamento_medico');
                $table->integer('id_medico');
                $table->dateTime('acompanhamento_data');
                $table->text('acompanhamento_obs');
                $table->string('login_usuario', 100);
                $table->dateTime('data_gravacao');

                $table->timestamps();
                $table->primary('id_acompanhamento_dm');

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
        //Schema::dropIfExists('dm_acompanhas');
    }
}
