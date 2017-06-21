<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class CreateContasTable extends Migration
{

    public $fk_name = 'FK_CONTA_TIPO_CONTA';

    private $tabela = 'CONTA';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('CONTA_ID');
                $table->string('CONTA_NOME', 100)->unique();
                $table->integer('TIPO_CONTA_ID');
                $table->integer('CONTA_NUMERO')->unique();
                //$table->primary('ID_ESCOPO');
            });
        }

        // pesquisa pela foreign key
        if ( PesquisaFK( $this->fk_name ) == false ) {
            Schema::table('CONTA', function (Blueprint $table) {
                $table->foreign('TIPO_CONTA_ID', $this->fk_name)
                    ->references('TIPO_CONTA_ID')
                    ->on('TIPO_CONTA')
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
        //Schema::dropIfExists('contas');
    }
}
