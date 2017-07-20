<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrigemServSocialsTable extends Migration
{
    private $tabela = 'ORIGEM_SERVSOCIAL';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_ORIGEM_SERVSOCIAL');
                $table->string('ORIGEM_SERVSOCIAL_DESCRICAO', 100)->unique();
                $table->timestamps();

                $table->primary('ID_ORIGEM_SERVSOCIAL');
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
        //Schema::dropIfExists('origem_serv_socials');
    }
}
