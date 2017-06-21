<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepMedicosTable extends Migration
{
    private $tabela  = 'DEPARTAMENTO_MEDICO';

    public $fk_name1 = 'FK_DM_JOGADOR';
    public $fk_name2 = 'FK_DM_CATEGORIAS';
    public $fk_name3 = 'FK_DM_ORIGEM_LESAO';
    public $fk_name4 = 'FK_DM_TIPO_LESAO';
    public $fk_name5 = 'FK_DM_PARTE_CORPO';
    public $fk_name6 = 'FK_DM_MEDICOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_DEPARTAMENTO_MEDICO')->unique();
                $table->integer('ID_JOGADOR');
                $table->datetime('DM_DATA_INICIO');
                $table->datetime('DM_DATA_FINAL');
                $table->integer('ID_ORIGEM_LESAO');
                $table->integer('ID_TIPO_LESAO');
                $table->integer('ID_PARTE_CORPO');
                $table->integer('ID_CATEGORIA');
                $table->integer('ID_MEDICO');

                $table->string('FLAG_AFASTAMENTO',6);
                $table->integer('DM_TEMPO_PERMANENCIA');
                $table->datetime('DATA_CONCLUSAO_CONSULTA');
                $table->binary('DM_IMAGEM');

                $table->integer('ID_LOCAL');
                $table->dateTime('DT_LOCAL2');
                $table->dateTime('DT_LOCAL3');


                $table->text('DM_OBSERVACAO');
            });
        }

        // pesquisa pela foreign key
        if ( PesquisaFK( $this->fk_name1 ) == false ) {
            Schema::table($this->tabela, function (Blueprint $table) {
                $table->foreign('ID_JOGADOR', $this->fk_name1)
                    ->references('ID_JOGADOR')
                    ->on('JOGADORES')
                ;
            });
        }

        // pesquisa pela foreign key
        if ( PesquisaFK( $this->fk_name2 ) == false ) {
            Schema::table($this->tabela, function (Blueprint $table) {
                $table->foreign('ID_CATEGORIA', $this->fk_name2)
                    ->references('ID_CATEGORIA')
                    ->on('CATEGORIAS')
                ;
            });
        }

        if ( PesquisaFK( $this->fk_name3 ) == false ) {
            Schema::table($this->tabela, function (Blueprint $table) {
                $table->foreign('ID_ORIGEM_LESAO', $this->fk_name3)
                    ->references('ID_ORIGEM_LESAO')
                    ->on('ORIGEM_LESAO')
                ;
            });
        }

        if ( PesquisaFK( $this->fk_name4 ) == false ) {
            Schema::table($this->tabela, function (Blueprint $table) {
                $table->foreign('ID_TIPO_LESAO', $this->fk_name4)
                    ->references('ID_TIPO_LESAO')
                    ->on('TIPO_LESAO')
                ;
            });
        }

        if ( PesquisaFK( $this->fk_name5 ) == false ) {
            Schema::table($this->tabela, function (Blueprint $table) {
                $table->foreign('ID_PARTE_CORPO', $this->fk_name5)
                    ->references('ID_PARTE_CORPO')
                    ->on('PARTE_CORPO')
                ;
            });
        }

        /*
        if ( PesquisaFK( $this->fk_name6 ) == false ) {
            Schema::table($this->tabela, function (Blueprint $table) {
                $table->foreign('ID_MEDICO', $this->fk_name6)
                    ->references('ID_USUARIO')
                    ->on('USUARIOS')
                ;
            });
        }
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('dep_medicos');
    }
}
