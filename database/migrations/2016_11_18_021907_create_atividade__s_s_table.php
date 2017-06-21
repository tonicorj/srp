<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadeSSTable extends Migration
{
    private $tabela = 'ATIVIDADE_ASSIT_SOCIAL';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->integer('ID_ATIV_ASSIST_SOCIAL');
                $table->string('ATIV_ASSIST_SOCIAL_DESCR', 100)->unique();

                $table->primary('ID_ATIV_ASSIST_SOCIAL');
                /*
                if(!Schema::hasColumn('ID_ATIV_ASSIST_SOCIAL'))
                    $table->increments('ID_ATIV_ASSIST_SOCIAL');
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
