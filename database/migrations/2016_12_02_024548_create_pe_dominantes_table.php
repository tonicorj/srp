<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeDominantesTable extends Migration
{
    private $tabela = 'PE_DOMINANTE';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                        $table->string('pe_dominante', 1)->unique();
                        $table->string('pe_dominante_descricao', 20)->unique();
                        $table->primary('pe_dominante');
                        //$table->timestamps();
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
        //Schema::dropIfExists('pe_dominantes');
    }
}
