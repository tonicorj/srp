<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SRP\Escolaridades;

class EscolaridadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // faz a crítica, pois se der erro pelo menos grava o registro
        try
        { DB::statement('SET IDENTITY_INSERT ESCOLARIDADE ON'); }
        catch (\Exception $e)
        { }

        if (Escolaridades::find(0) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 0, 'ESCOLARIDADE_DESCRICAO' => utf8_encode('-- Não informado')));
        }
        if (Escolaridades::find(1) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 1, 'ESCOLARIDADE_DESCRICAO' => utf8_encode('PRIMÁRIO INCOMPLETO')));
        }
        if (Escolaridades::find(2) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 2, 'ESCOLARIDADE_DESCRICAO' => utf8_encode('PRIMÁRIO COMPLETO')));
        }
        if (Escolaridades::find(3) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 3, 'ESCOLARIDADE_DESCRICAO' => utf8_encode('SEGUNDO GRAU INCOMPLETO')));
        }
        if (Escolaridades::find(4) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 4, 'ESCOLARIDADE_DESCRICAO' => utf8_encode('SEGUNDO GRAU COMPLETO')));
        }
        if (Escolaridades::find(5) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 5, 'ESCOLARIDADE_DESCRICAO' => utf8_encode('SUPERIOR INCOMPLETO')));
        }
        if (Escolaridades::find(6) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 6, 'ESCOLARIDADE_DESCRICAO' => utf8_encode('SUPERIOR COMPLETO')));
        }
        if (Escolaridades::find(7) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 7, 'ESCOLARIDADE_DESCRICAO' => utf8_encode('PÓS-GRADUAÇÃO')));
        }
        if (Escolaridades::find(8) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 8, 'ESCOLARIDADE_DESCRICAO' => utf8_encode('MESTRADO')));
        }
        if (Escolaridades::find(9) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 9, 'ESCOLARIDADE_DESCRICAO' => utf8_encode('DOUTORADO')));
        }

        try
        { DB::statement('SET IDENTITY_INSERT ESCOLARIDADE OFF'); }
        catch (\Exception $e)
        { }

    }
}
