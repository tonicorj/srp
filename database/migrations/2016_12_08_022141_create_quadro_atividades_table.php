<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuadroAtividadesTable extends Migration
{

    public $fk_name  = 'FK_QUADRO_ATIVIDADES_CATEGORIA';
    public $fk_name1 = 'FK_QUADRO_ATIVIDADES_ATIVIDADE_1';
    public $fk_name2 = 'FK_QUADRO_ATIVIDADES_ATIVIDADE_2';
    public $fk_name3 = 'FK_QUADRO_ATIVIDADES_ATIVIDADE_3';
    private $tabela = 'QUADRO_ATIVIDADES';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_QUADRO_ATIVIDADE');
                $table->integer('ID_CATEGORIA');
                $table->datetime('QUADRO_ATIVIDADE_DATA');
                $table->integer('QUADRO_ATIVIDADE_POSICAO');
                $table->string('QUADRO_ATIVIDADE_HORA',10);
                $table->integer('ID_ATIVIDADE');
                $table->integer('ID_ATIVIDADE2');
                $table->integer('ID_ATIVIDADE3');
                $table->integer('ID_LOCAL_ATIVIDADE');
                $table->string('QUADRO_ATIVIDADE_COMPLEMENTO',100);
                $table->text('QUADRO_ATIVIDADE_OBS');
                $table->text('QUADRO_ATIVIDADE_OBS1');
                $table->text('QUADRO_ATIVIDADE_OBS2');
                $table->text('QUADRO_ATIVIDADE_OBS3');
                //$table->primary('ID_ESCOPO');
            });
        }

        // pesquisa pela foreign key
        if ( PesquisaFK( $this->fk_name ) == false ) {
            Schema::table('QUADRO_ATIVIDADES', function (Blueprint $table) {
                $table->foreign('ID_CATEGORIA', $this->fk_name)
                    ->references('ID_CATEGORIA')
                    ->on('CATEGORIAS')
                ;
            });
        }

        if ( PesquisaFK( $this->fk_name1 ) == false ) {
            Schema::table('QUADRO_ATIVIDADES', function (Blueprint $table) {
                $table->foreign('ID_ATIVIDADE', $this->fk_name1)
                    ->references('ID_ATIVIDADE')
                    ->on('ATIVIDADES')
                ;
            });
        }

        if ( PesquisaFK( $this->fk_name2 ) == false ) {
            Schema::table('QUADRO_ATIVIDADES', function (Blueprint $table) {
                $table->foreign('ID_ATIVIDADE2', $this->fk_name2)
                    ->references('ID_ATIVIDADE')
                    ->on('ATIVIDADES')
                ;
            });
        }

        if ( PesquisaFK( $this->fk_name3 ) == false ) {
            Schema::table('QUADRO_ATIVIDADES', function (Blueprint $table) {
                $table->foreign('ID_ATIVIDADE3', $this->fk_name3)
                    ->references('ID_ATIVIDADE')
                    ->on('ATIVIDADES')
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
        Schema::dropIfExists('quadro_atividades');
    }
}
