<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use SRP\estadocivil;


class EstadocivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // faz a cr�tica, pois se der erro pelo menos grava o registro
        //
        if ( estadocivil::find(0) == null ) {
            estadocivil::create( array('ID_ESTADOCIVIL'=> 0, 'ESTADOCIVIL_DESCRICAO' => utf8_encode('-- N�o informado')));
        }
        if ( estadocivil::find(1) == null ) {
            estadocivil::create( array('ID_ESTADOCIVIL'=> 1, 'ESTADOCIVIL_DESCRICAO' => 'Casado'));
        }
        if ( estadocivil::find(2) == null ) {
            estadocivil::create( array('ID_ESTADOCIVIL'=> 2, 'ESTADOCIVIL_DESCRICAO' => 'Solteiro'));
        }
        if ( estadocivil::find(3) == null ) {
            estadocivil::create( array('ID_ESTADOCIVIL'=> 3, 'ESTADOCIVIL_DESCRICAO' => 'Desquitado'));
        }
        if ( estadocivil::find(4) == null ) {
            estadocivil::create( array('ID_ESTADOCIVIL'=> 4, 'ESTADOCIVIL_DESCRICAO' => utf8_encode('Vi�vo')));
        }
        if ( estadocivil::find(5) == null ) {
            estadocivil::create( array('ID_ESTADOCIVIL'=> 5, 'ESTADOCIVIL_DESCRICAO' => utf8_encode('Uni�o Est�vel')));
        }
    }
}
