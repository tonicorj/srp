<?php

use Illuminate\Database\Seeder;
use SRP\ocorrenciaGravidade;

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
            ocorrenciaGravidade::create( array('GRAVIDADE_DESCRICAO' => utf8_encode('Registro')));
        }
        if ( ocorrenciaGravidade::find(1) == null ) {
            ocorrenciaGravidade::create( array('GRAVIDADE_DESCRICAO' => utf8_encode('Leve')));
        }
        if ( ocorrenciaGravidade::find(2) == null ) {
            ocorrenciaGravidade::create( array('GRAVIDADE_DESCRICAO' => utf8_encode('Moderada')));
        }
        if ( ocorrenciaGravidade::find(3) == null ) {
            ocorrenciaGravidade::create( array('GRAVIDADE_DESCRICAO' => utf8_encode('Grave')));
        }
        if ( ocorrenciaGravidade::find(4) == null ) {
            ocorrenciaGravidade::create( array('GRAVIDADE_DESCRICAO' => utf8_encode('Restrita')));
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