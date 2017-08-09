<?php

use Illuminate\Database\Seeder;
use SRP\Models\adm\estadocivil;


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
        if ( estadocivil::find(1) == null ) {
            estadocivil::create( array('ID_ESTADOCIVIL'=> 1, 'ESTADOCIVIL_DESCRICAO' => trans( 'messages.estado_civil_casado')));
        }
        if ( estadocivil::find(2) == null ) {
            estadocivil::create( array('ID_ESTADOCIVIL'=> 2, 'ESTADOCIVIL_DESCRICAO' => trans( 'messages.estadocivil_solteiro')));
        }
        if ( estadocivil::find(3) == null ) {
            estadocivil::create( array('ID_ESTADOCIVIL'=> 3, 'ESTADOCIVIL_DESCRICAO' => trans( 'messages.estadocivil_desquitado')));
        }
        if ( estadocivil::find(4) == null ) {
            estadocivil::create( array('ID_ESTADOCIVIL'=> 4, 'ESTADOCIVIL_DESCRICAO' => trans( 'messages.estadocivil_viuvo')));
        }
        if ( estadocivil::find(5) == null ) {
            estadocivil::create( array('ID_ESTADOCIVIL'=> 5, 'ESTADOCIVIL_DESCRICAO' => trans( 'messages.estadocivil_uniao')));
        }
    }
}
