<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AtendimentoSS extends Migration
{

    public $fk_name  = 'FK_ATENDIMENTO_ASSIST_SOCIAL_CATEGORIA';

    public $fk_name1 = 'FK_ATENDIMENTO_ASSIST_SOCIAL_JOGADOR';
    public $fk_name2 = 'FK_ATENDIMENTO_ASSIST_SOCIAL_FUNCIONARIO';
    public $fk_name3 = 'FK_ATENDIMENTO_ASSIST_SOCIAL_ATIVIDADE';
    public $fk_name4 = 'FK_ATENDIMENTO_ASSIST_SOCIAL_ORIGEM';
    private $tabela = 'ATENDIMENTO_ASSIST_SOCIAL';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_ATEND_ASSIST_SOCIAL')->unique();
                $table->datetime('VISITA_DATA');
                $table->integer('ID_JOGADOR');
                $table->integer('ID_ATIV_ASSIST_SOCIAL');
                $table->integer('ID_ORIGEM_SERVSOCIAL');
                $table->integer('ID_CATEGORIA');
                $table->integer('ID_USUARIO');
                $table->string('NOME_USUARIO',100);
                $table->string('NOME',100);
                $table->text('OBS_ATIVIDADE');
            });
        }

        // pesquisa pela foreign key
        if ( PesquisaFK( $this->fk_name ) == false ) {
            Schema::table('ATENDIMENTO_ASSIST_SOCIAL', function (Blueprint $table) {
                $table->foreign('ID_CATEGORIA', $this->fk_name)
                    ->references('ID_CATEGORIA')
                    ->on('CATEGORIAS')
                ;
            });
        }

        if ( PesquisaFK( $this->fk_name1 ) == false ) {
            Schema::table('ATENDIMENTO_ASSIST_SOCIAL', function (Blueprint $table) {
                $table->foreign('ID_JOGADOR', $this->fk_name1)
                    ->references('ID_JOGADOR')
                    ->on('JOGADORES')
                ;
            });
        }

        if ( PesquisaFK( $this->fk_name2 ) == false ) {
            Schema::table('ATENDIMENTO_ASSIST_SOCIAL', function (Blueprint $table) {
                $table->foreign('ID_USUARIO', $this->fk_name2)
                    ->references('ID_USUARIO')
                    ->on('USUARIOS')
                ;
            });
        }

        /*
        if ( PesquisaFK( $this->fk_name3 ) == false ) {
            Schema::table('ATENDIMENTO_ASSIST_SOCIAL', function (Blueprint $table) {
                $table->foreign('ID_ATEND_ASSIST_SOCIAL', $this->fk_name3)
                    ->references('ID_ATIV_ASSIST_SOCIAL')
                    ->on('ATIVIDADES_ASSIST_SOCIAL')
                ;
            });
        }
        */

        if ( PesquisaFK( $this->fk_name4 ) == false ) {
            Schema::table('ATENDIMENTO_ASSIST_SOCIAL', function (Blueprint $table) {
                $table->foreign('ID_ORIGEM_SERVSOCIAL', $this->fk_name4)
                    ->references('ID_ORIGEM_SERVSOCIAL')
                    ->on('ORIGEM_SERVSOCIAL')
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
