<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotivoAusenciaEscolarsTable extends Migration
{
    private $tabela = 'motivo_ausencia_escolar';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('id_motivo_ausencia_escolar');
                $table->string('motivo_ausencia_descricao', 50);
                $table->string('flag_ausencia_descricao', 1);
                $table->string('motivo_ausencia_letra', 1);
                $table->timestamps();
                $table->primary('id_motivo_ausencia_escolar');
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
        //Schema::dropIfExists('motivo_ausencia_escolars');
    }
}
