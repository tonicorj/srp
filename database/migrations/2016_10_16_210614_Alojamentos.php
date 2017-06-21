<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alojamentos extends Migration
{
    private $tabela = 'ALOJAMENTO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->integer('ID_ALOJAMENTO');
                $table->string('ALOJAMENTO_NOME', 50);
                $table->integer('ALOJAMENTO_QTD_VAGAS');

                $table->primary('ID_ALOJAMENTO');
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
        //
    }
}
