<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CursosExtras extends Migration
{
    private $tabela = 'CURSOS_EXTRAS';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_CURSO')->unique();
                $table->string('CURSO_NOME',100)->unique();
                $table->dateTime('CURSO_DT_INICIO', 15);
                $table->dateTime('CURSO_DT_FINAL', 20);
                $table->string('CURSO_EMPRESA', 100);
                $table->text('CURSO_OBS');

                $table->timestamps();
                $table->primary('ID_CURSO');
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
