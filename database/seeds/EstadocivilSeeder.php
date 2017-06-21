<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use SRP\Estadocivil;


class EstadocivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // faz a crítica, pois se der erro pelo menos grava o registro
        //
        if ( EstadoCivil::find(0) == null ) {
            EstadoCivil::create( array('ID_ESTADOCIVIL'=> 0, 'ESTADOCIVIL_DESCRICAO' => utf8_encode('-- Não informado')));
        }
        if ( EstadoCivil::find(1) == null ) {
            EstadoCivil::create( array('ID_ESTADOCIVIL'=> 1, 'ESTADOCIVIL_DESCRICAO' => 'Casado'));
        }
        if ( EstadoCivil::find(2) == null ) {
            EstadoCivil::create( array('ID_ESTADOCIVIL'=> 2, 'ESTADOCIVIL_DESCRICAO' => 'Solteiro'));
        }
        if ( EstadoCivil::find(3) == null ) {
            EstadoCivil::create( array('ID_ESTADOCIVIL'=> 3, 'ESTADOCIVIL_DESCRICAO' => 'Desquitado'));
        }
        if ( EstadoCivil::find(4) == null ) {
            EstadoCivil::create( array('ID_ESTADOCIVIL'=> 4, 'ESTADOCIVIL_DESCRICAO' => utf8_encode('Viúvo')));
        }
        if ( EstadoCivil::find(5) == null ) {
            EstadoCivil::create( array('ID_ESTADOCIVIL'=> 5, 'ESTADOCIVIL_DESCRICAO' => utf8_encode('União Estável')));
        }
    }
}
