<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoEscolarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public $fk_name1  = 'FK_HISTORICO_ESCOLAR_JOGADOR';
    private $tabela = 'JOGADOR_HIST_ESCOLAR';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_HIST_ESCOLAR')->unique();
                $table->integer('ID_JOGADOR');
                $table->string('ESCOLA_ANO', 15);
                $table->string('ESCOLA_SERIE', 20);
                $table->string('ESCOLA_TURMA', 10);
                $table->string('ESCOLA_PERIODO', 1);
                $table->string('ESCOLA_NOME', 200);
                $table->string('ESCOLA_ENDERECO', 200);
                $table->string('ESCOLA_TELEFONE', 40);
                $table->string('ESCOLA_CONTATO', 100);
                $table->string('FLAG_TRANSFERENCIA', 1);
                $table->string('FLAG_HISTORICO', 1);
                $table->string('FLAG_APROVADO', 1);
                $table->string('FLAG_RECLASSIFICADO', 1);
                $table->string('FLAG_1BIMESTRE', 1);
                $table->string('FLAG_2BIMESTRE', 1);
                $table->string('FLAG_3BIMESTRE', 1);
                $table->string('FLAG_4BIMESTRE', 1);
                $table->text('HIST_OBSERVACAO');

                $table->timestamps();
                $table->primary('ID_HIST_ESCOLAR');
            });
        }

        if ( PesquisaFK( $this->fk_name1 ) == false ) {
            Schema::table('JOGADOR_HIST_ESCOLAR', function (Blueprint $table) {
                $table->foreign('ID_JOGADOR', $this->fk_name1)
                    ->references('ID_JOGADOR')
                    ->on('JOGADORES')
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
        //Schema::dropIfExists('historico_escolars');
    }
}
