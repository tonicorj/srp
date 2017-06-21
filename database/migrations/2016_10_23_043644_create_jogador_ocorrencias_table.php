<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJogadorOcorrenciasTable extends Migration
{
    private $tabela = 'JOGADOR_OCORRENCIA';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $fk_name  = 'FK_JOGADOR_OCORRENCIA_JOGADOR';
    public $fk_name2 = 'FK_JOGADOR_OCORRENCIA_CATEGORIA';

    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->integer('ID_JOGADOR_OCORRENCIA');
                $table->integer('ID_JOGADOR')->unsigned;
                $table->datetime('OCORR_DATA');
                $table->integer('OCORR_TIPO')->unsigned;
                $table->text('OCORR_DESCRICAO');
                $table->integer('ID_CATEGORIA')->unsigned;
                $table->integer('ID_PUNICAO')->unsigned;
                $table->float('OCORR_PERCENTUAL');
                $table->float('OCORR_VALOR');

                $table->primary('ID_JOGADOR_OCORRENCIA');
                //$table->timestamps();
            });


            // pesquisa pela foreign key
            if ( PesquisaFK( $this->fk_name ) == false ) {
                Schema::table('JOGADOR_OCORRENCIA', function (Blueprint $table) {
                    $table->foreign('ID_JOGADOR', $this->fk_name)
                        ->references('ID_JOGADOR')
                        ->on('JOGADORES')
                    ;
                });
            }

            if ( PesquisaFK( $this->fk_name2 ) == false ) {
                Schema::table('JOGADOR_OCORRENCIA', function (Blueprint $table) {
                    $table->foreign('ID_CATEGORIA', $this->fk_name2)
                        ->references('ID_CATEGORIA')
                        ->on('CATEGORIAS')
                    ;
                });
            }

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('jogador_ocorrencias');
    }
}
