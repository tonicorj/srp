<?php

use Illuminate\Database\Seeder;
use SRP\Models\adm\escolaridades;

class EscolaridadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        // faz a cr�tica, pois se der erro pelo menos grava o registro
        try
        { DB::statement('SET IDENTITY_INSERT ESCOLARIDADE ON'); }
        catch (\Exception $e)
        { }

        if (Escolaridades::find(0) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 0, 'ESCOLARIDADE_DESCRICAO' => utf8_encode('-- N�o informado')));
        }

        try
        { DB::statement('SET IDENTITY_INSERT ESCOLARIDADE OFF'); }
        catch (\Exception $e)
        { }

         */

        if (Escolaridades::find(1) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 1, 'ESCOLARIDADE_DESCRICAO' => trans('messages.escolaridade_primario_incompleto')));
        }
        if (Escolaridades::find(2) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 2, 'ESCOLARIDADE_DESCRICAO' => trans('messages.escolaridade_primario_completo')));
        }
        if (Escolaridades::find(3) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 3, 'ESCOLARIDADE_DESCRICAO' => trans('messages.escolaridade_segundo_incompleto')));
        }
        if (Escolaridades::find(4) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 4, 'ESCOLARIDADE_DESCRICAO' => trans('messages.escolaridade_segundo_completo')));
        }
        if (Escolaridades::find(5) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 5, 'ESCOLARIDADE_DESCRICAO' => trans('messages.escolaridade_superior_incompleto')));
        }
        if (Escolaridades::find(6) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 6, 'ESCOLARIDADE_DESCRICAO' => trans('messages.escolaridade_superior_completo')));
        }
        if (Escolaridades::find(7) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 7, 'ESCOLARIDADE_DESCRICAO' => trans('messages.escolaridade_pos')));
        }
        if (Escolaridades::find(8) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 8, 'ESCOLARIDADE_DESCRICAO' => trans('messages.escolaridade_mestrado')));
        }
        if (Escolaridades::find(9) == null) {
            Escolaridades::create(array('ID_ESCOLARIDADE' => 9, 'ESCOLARIDADE_DESCRICAO' => trans('messages.escolaridade_doutorado')));;
        }
    }
}
