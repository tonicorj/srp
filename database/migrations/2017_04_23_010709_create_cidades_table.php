<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    public $fk_name  = 'FK_CIDADES_PAISES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('CIDADES')) {
            Schema::create('CIDADES', function (Blueprint $table) {
                $table->increments('ID_CIDADE')->unique();
                $table->string('UF', 2);
                $table->integer('ID_PAIS');
                $table->string('CIDADE_NOME', 100);
            });
        };

        // pesquisa pela foreign key
        if ( PesquisaFK( $this->fk_name ) == false ) {
            Schema::table('CIDADES', function (Blueprint $table) {
                $table->foreign('ID_PAIS', $this->fk_name)
                    ->references('ID_PAIS')
                    ->on('PAISES')
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
        //Schema::dropIfExists('cidades');
    }
}
