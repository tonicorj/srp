<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MotivoAusencia extends Migration
{
    private $tabela = 'MOTIVO_AUSENCIA';
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
                $table->integer('ID_MOTIVO_AUSENCIA');
                $table->string('MOTIVO_AUSENCIA_DESCRICAO', 100);

                $table->primary('ID_MOTIVO_AUSENCIA');
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
