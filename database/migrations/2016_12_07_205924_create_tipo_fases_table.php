<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoFasesTable extends Migration
{
    private $tabela = 'TIPOFASE';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_TIPOFASE');
                $table->string('TFASE_DESCRICAO', 100)->unique();
                $table->timestamps();
                $table->primary('ID_TIPOFASE');
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
        //Schema::dropIfExists('tipo_fases');
    }
}
