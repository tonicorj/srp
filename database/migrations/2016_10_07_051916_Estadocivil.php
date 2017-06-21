<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class Estadocivil extends Migration
{
    private $tabela  = 'ESTADOCIVIL';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table){
                $table->integer('ID_ESTADOCIVIL');
                $table->string('ESTADOCIVIL_DESCRICAO',40);

                $table->primary('ID_ESTADOCIVIL');
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
