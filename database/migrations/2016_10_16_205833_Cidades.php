<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cidades extends Migration
{
    private $tabela = 'CIDADES';

    /**
     * Run the migrations.
     *
     * @return void
     */

    public $fk_name = 'FK_CIDADES_PAIS';

    public function up()
    {
        if (! Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table){
                $table->increments('ID_CIDADE');
                $table->string('CIDADE_NOME',100);
                $table->string('UF',6);
                $table->integer('ID_PAIS');

                $table->timestamps();
                $table->primary('ID_CIDADE');
            });
        }

        // pesquisa pela foreign key
        if ( PesquisaFK( $this->fk_name ) == false ) {
            Schema::table('CIDADES', function (Blueprint $table) {
                $table->foreign('id_pais', $this->fk_name)
                    ->references('id_pais')
                    ->on('paises')
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
        //
    }
}
