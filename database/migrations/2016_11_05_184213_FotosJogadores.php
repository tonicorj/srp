<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FotosJogadores extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // cria campo para gravar o nome do arquivo de imagem
        if (!Schema::hasColumn('JOGADORES','JOG_IMAGEM')) {
            Schema::table('JOGADORES', function (Blueprint $table) {
                $table->string('JOG_IMAGEM', 100)->nullable();
            });
        }

        // cria campo para gravar o nome do arquivo de imagem
        if (!Schema::hasColumn('JOGADORES_EM_OBSERVACAO','JOG_IMAGEM')) {
            Schema::table('JOGADORES_EM_OBSERVACAO', function (Blueprint $table) {
                $table->string('JOG_IMAGEM', 100)->nullable();
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
