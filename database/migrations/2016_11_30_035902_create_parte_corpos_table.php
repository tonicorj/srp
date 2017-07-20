<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParteCorposTable extends Migration
{
    private $tabela = 'PARTE_CORPO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_PARTE_CORPO');
                $table->string('PARTE_CORPO_DESCRICAO', 100)->unique();

                $table->primary('ID_PARTE_CORPO');
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
        //Schema::dropIfExists('parte_corpos');
    }
}
