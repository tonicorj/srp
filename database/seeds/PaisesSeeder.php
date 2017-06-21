<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SRP\Paises;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if ( Paises::find(0) == null ) {
            // faz a crítica, pois se der erro pelo menos grava o registro
            try
            { DB::statement('SET IDENTITY_INSERT PAISES ON'); }
            catch (\Exception $e)
            { }

            Paises::create( array('ID_PAIS'=>0, 'PAIS_NOME' => utf8_encode('-- Não informado'), 'PAIS_SIGLA'=> 'NNN'));

            // faz a crítica, pois se der erro pelo menos grava o registro
            try
            { DB::statement('SET IDENTITY_INSERT PAISES OFF'); }
            catch (\Exception $e)
            { }
        }
    }
}
