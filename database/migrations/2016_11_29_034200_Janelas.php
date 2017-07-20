<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Janelas extends Migration
{
    private $tabela = 'JANELAS';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_JANELA');
                $table->string('JANELA_NOME', 50)->unique();
                $table->dateTime('JANELA_INICIO');
                $table->dateTime('JANELA_FINAL');

                $table->primary('ID_JANELA');
                /*
                if(!Schema::hasColumn('ID_JANELA'))
                    $table->increments('ID_JANELA');
                */
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
