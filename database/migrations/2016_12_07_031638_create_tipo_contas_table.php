<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoContasTable extends Migration
{
    private $tabela = 'TIPO_CONTA';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('TIPO_CONTA_ID');
                $table->string('TIPO_CONTA_DESCRICAO', 100)->unique();
                $table->string('TIPO_CONTA_TIPO', 1);
                $table->integer('TIPO_CONTA_NUM')->unique();
                $table->string('TIPO_CONTA_RECEBIMENTO',1);
                $table->timestamps();

                $table->primary('TIPO_CONTA_ID');
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
        //Schema::dropIfExists('tipo_contas');
    }
}
