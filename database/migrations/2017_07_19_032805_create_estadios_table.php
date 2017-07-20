<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadiosTable extends Migration
{
    private $tabela = 'estadio';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('id_estadios');
                $table->string('uf', 6);
                $table->integer('id_cidade');
                $table->integer('id_pais');
                $table->string('estadio_nome', 100);
                $table->string('estadio_nome_real', 100);
                $table->float('estadio_capacidade');
                $table->float('estadio_comprimento');
                $table->float('estadio_largura');
                $table->text('estadio_obs');
                $table->timestamps();
                $table->primary('id_estadios');
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
        //Schema::dropIfExists('estadios');
    }
}
