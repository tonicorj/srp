<?php

use Illuminate\Database\Seeder;
use SRP\Models\adm\ocorrenciaGravidade;

class GravidadeOcorrenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ( ocorrenciaGravidade::find(0) == null ) {
            ocorrenciaGravidade::create( array('GRAVIDADE_DESCRICAO' => trans('message.gravidade_registro')));
        }
        if ( ocorrenciaGravidade::find(1) == null ) {
            ocorrenciaGravidade::create( array('GRAVIDADE_DESCRICAO' => trans('message.gravidade_leve')));
        }
        if ( ocorrenciaGravidade::find(2) == null ) {
            ocorrenciaGravidade::create( array('GRAVIDADE_DESCRICAO' => trans('message.gravidade_moderada')));
        }
        if ( ocorrenciaGravidade::find(3) == null ) {
            ocorrenciaGravidade::create( array('GRAVIDADE_DESCRICAO' => trans('message.gravidade_grave')));
        }
        if ( ocorrenciaGravidade::find(4) == null ) {
            ocorrenciaGravidade::create( array('GRAVIDADE_DESCRICAO' => trans('message.gravidade_restrita')));
        }
    }
}

/*
 set identity_insert gravidade_ocorrencias on
 insert into gravidade_ocorrencias (id_gravidade, gravidade_descricao) values ( 0, 'Registro' )
 set identity_insert gravidade_ocorrencias off

 update gravidade_ocorrencias set gravidade_descricao = 'Moderada'	where id_gravidade = 1
 update gravidade_ocorrencias set gravidade_descricao = 'Leve'		where id_gravidade = 2
 update gravidade_ocorrencias set gravidade_descricao = 'Moderada'	where id_gravidade = 3
 update gravidade_ocorrencias set gravidade_descricao = 'Grave'		where id_gravidade = 4
 update gravidade_ocorrencias set gravidade_descricao = 'Restrita'	where id_gravidade = 5
 */