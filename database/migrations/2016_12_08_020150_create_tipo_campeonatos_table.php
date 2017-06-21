<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoCampeonatosTable extends Migration
{
    public $fk_name = 'FK_TIPOCAMPEONATO_ESCOPO';
    private $tabela = 'TIPOCAMPEONATO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_TIPOCAMP');
                $table->string('TCAMP_DESCRICAO', 200)->unique();
                $table->integer('ID_ESCOPO');
                //$table->primary('ID_ESCOPO');
            });
        }

        // pesquisa pela foreign key
        if ( PesquisaFK( $this->fk_name ) == false ) {
            Schema::table('TIPOCAMPEONATO', function (Blueprint $table) {
                $table->foreign('ID_ESCOPO', $this->fk_name)
                    ->references('ID_ESCOPO')
                    ->on('ESCOPO')
                ;
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
        //Schema::dropIfExists('tipo_campeonatos');
    }
}
