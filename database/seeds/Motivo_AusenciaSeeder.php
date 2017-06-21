<?php

use Illuminate\Database\Seeder;

use SRP\Motivo_Ausencia;

class Motivo_AusenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Motivo_Ausencia::find(0) == null) {
            Motivo_Ausencia::create(array('ID_MOTIVO_AUSENCIA' => 0, 'MOTIVO_AUSENCIA_DESCRICAO' => utf8_encode('-- Não informado')));
        }
    }
}
