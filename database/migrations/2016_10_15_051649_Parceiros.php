<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Parceiros extends Migration
{
    private $tabela = 'PARCEIROS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public $fk_name = 'FK_PARCEIROS_CIDADE';
    //$fk_name = 'FK_PARCEIROS_CIDADE';
    //$fk_name = 'parceiros_id_cidade_foreign';

    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->integer('ID_PARCEIRO');
                $table->integer('ID_CIDADE');
                $table->string('PARCEIRO_NOME', 100);
                $table->integer('PARCEIRO_PRIORIDADE');
                $table->string('PARCEIRO_TELEFONE', 60);
                $table->string('PARCEIRO_CELULAR', 60);
                $table->string('PARCEIRO_MAIL', 100);
                $table->string('NOME_CONTATO_PARCEIRO', 200);

                $table->primary('ID_PARCEIRO');
            });
        }

        // pesquisa pela foreign key
        if ( PesquisaFK( $this->fk_name ) == false ) {
            Schema::table('PARCEIROS', function (Blueprint $table) {
               $table->foreign('id_cidade', $this->fk_name)
                   ->references('id_cidade')
                   ->on('cidades')
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
        Schema::table('PARCEIROS', function (Blueprint $table) {
            if ( PesquisaFK( $this->fk_name) == true ) {
                $table->dropForeign($this->fk_name);
            }
        });
    }
}
