<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cargos extends Migration
{
    private $tabela = 'CARGO_COMISSAO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->integer('ID_CARGO_COMISSAO');
                $table->string('CARGO_COMISSAO', 100);
                $table->string('CARGO_COMISSAO_INGLES', 100);

                $table->primary('ID_CARGO_COMISSAO');
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

