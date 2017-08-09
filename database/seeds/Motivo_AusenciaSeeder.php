<?php

use Illuminate\Database\Seeder;

use SRP\Models\adm\MotivoAusencia;

class Motivo_AusenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoAusencia::create(array( 'MOTIVO_AUSENCIA_DESCRICAO' => trans('message.motivoausencia_familiar' )));
        MotivoAusencia::create(array( 'MOTIVO_AUSENCIA_DESCRICAO' => trans('message.motivoausencia_medico' )));
        MotivoAusencia::create(array( 'MOTIVO_AUSENCIA_DESCRICAO' => trans('message.motivoausencia_transito' )));
        MotivoAusencia::create(array( 'MOTIVO_AUSENCIA_DESCRICAO' => trans('message.motivoausencia_morte' )));
        MotivoAusencia::create(array( 'MOTIVO_AUSENCIA_DESCRICAO' => trans('message.motivoausencia_escolar' )));
        MotivoAusencia::create(array( 'MOTIVO_AUSENCIA_DESCRICAO' => trans('message.motivoausencia_acidente' )));
    }
}
