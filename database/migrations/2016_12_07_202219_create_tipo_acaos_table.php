<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoAcaosTable extends Migration
{
    private $tabela = 'TIPO_ACAO_MARKETING';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_TIPO_ACAO_MARKETING');
                $table->string('TIPO_ACAO_MARKETING_DESCRICAO', 100)->unique();
                $table->timestamps();
                $table->primary('ID_TIPO_ACAO_MARKETING');
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
        //Schema::dropIfExists('tipo_acaos');
    }
}
