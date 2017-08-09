<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Departamentos extends Migration
{
    private $tabela = 'DEPARTAMENTOS';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $fk_name = 'FK_DEPARTAMENTOS_USUARIO';

    public function up()
    {
        if (!Schema::hasTable($this->tabela)) {
            Schema::create($this->tabela, function (Blueprint $table) {
                $table->increments('ID_DEPARTAMENTO');
                $table->string('DEPARTAMENTO_DESCRICAO', 100)->unique();
                $table->integer('ID_FUNCIONARIO');
                $table->integer('ID_DEPARTAMENTO_PAI');

                $table->timestamps();

                $table->primary('ID_DEPARTAMENTO');

            });

            if ( PesquisaFK( $this->fk_name ) == false ) {
                Schema::table('DEPARTAMENTOS', function (Blueprint $table) {
                    $table->foreign('id_funcionario', $this->fk_name)
                        ->references('id_usuario')
                        ->on('usuarios')
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
        //
    }
}
