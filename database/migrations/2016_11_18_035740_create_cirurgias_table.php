<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCirurgiasTable extends Migration
{
    private $tabela = 'CIRURGIAS';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->integer('ID_CIRURGIA');
                $table->string('CIRURGIA_NOME', 100)->unique();

                $table->primary('ID_CIRURGIA');
                /*
                if(!Schema::hasColumn('ID_CIRURGIA'))
                    $table->increments('ID_CIRURGIA');
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
    }
}
