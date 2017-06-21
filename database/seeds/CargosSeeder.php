<?php

use Illuminate\Database\Seeder;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Cargos::find(0) == null) {
            Cargos::create(array('ID_CARGO_COMISSAO' => 0, 'CARGO_COMISSAO' => utf8_encode('-- Não informado')));
        }
    }
}
