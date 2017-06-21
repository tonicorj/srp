<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketingEventosTable extends Migration
{
    private $tabela = 'MARKETING_EVENTO';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_MARKETING_EVENTO');
                $table->string('MARKETING_EVENTO_DESCRICAO', 100)->unique();
                $table->datetime('MARKETING_EVENTO_DATA');
                $table->integer('ID_TIPO_ACAO');
                $table->text('MARKETING_EVENTO_OBS');
                //$table->timestamps();
            });
        }

        // pesquisa pela foreign key
        if ( PesquisaFK( $this->fk_name ) == false ) {
            Schema::table('MARKETING_EVENTO', function (Blueprint $table) {
                $table->foreign('ID_TIPO_ACAO', $this->fk_name)
                    ->references('ID_TIPO_ACAO_MARKETING')
                    ->on('TIPO_ACAO_MARKETING')
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
        //Schema::dropIfExists('marketing_eventos');
    }
}
