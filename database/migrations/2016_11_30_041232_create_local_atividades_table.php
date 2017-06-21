<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalAtividadesTable extends Migration
{
    private $tabela = 'LOCAL_ATIVIDADE';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_LOCAL_ATIVIDADE');
                $table->string('LOCAL_ATIVIDADE_DESCRICAO', 100)->unique();
                //$table->primary('ID_ESCOPO');
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
        //Schema::dropIfExists('local_atividades');
    }
}
