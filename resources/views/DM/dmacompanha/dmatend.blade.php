<?php
/**
 * Created by Tonico
 * User: tonico
 * Date: 21/04/2017
 * Time: 02:46
 * Form que exibe os dados do atendimento
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>{!! trans('messages.t_depmedico_atendimento') !!}</h4>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="form-group col-lg-5">
                {!! Form::hidden('ID_DEPARTAMENTO_MEDICO', $dmatend->ID_DEPARTAMENTO_MEDICO, ['class'=>'form-control']) !!}
                {!! Form::label('JOG_NOME_APELIDO' , trans('messages.tit_jogador')) !!}
                {!! Form::text ('JOG_NOME_APELIDO', $dmatend['JOG_NOME_APELIDO'],
                    ['class'=>'form-control'
                    , 'readonly' =>'true'
                    , 'id'=>'JOG_NOME_APELIDO'
                    ]) !!}
            </div>
            <div class="form-group col-lg-1"></div>
            <div class="form-group col-lg-2">
                {!! Form::label('DM_DATA_INICIO', trans('messages.tit_depmedico_inicio')) !!}
                {!! Form::text ('DM_DATA_INICIO', data_display($dmatend['DM_DATA_INICIO']),
                    ['class'=>'form-control'
                    , 'readonly' =>'true'
                    , 'id'=>'DM_DATA_INICIO'
                    ]) !!}
            </div>
            <div class="form-group col-lg-1"></div>
            <div class="form-group col-lg-2">
                {!! Form::label('DM_DATA_FIM', trans('messages.tit_depmedico_fim')) !!}
                {!! Form::text ('DM_DATA_FIM', data_display($dmatend['DM_DATA_FIM_S']),
                    ['class'=>'form-control'
                    , 'readonly' =>'true'
                    , 'id'=>'DM_DATA_FIM'
                    ]) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-3">
                {!! Form::label('ORIGEM_LESAO_DESCRICAO' , trans('messages.tit_origem_lesao')) !!}
                {!! Form::text ('ORIGEM_LESAO_DESCRICAO', $dmatend['ORIGEM_LESAO_DESCRICAO'],
                    ['class'=>'form-control'
                    , 'readonly' =>'true'
                    , 'id'=>'ORIGEM_LESAO_DESCRICAO'
                    ]) !!}
            </div>

            <div class="form-group col-lg-3">
                {!! Form::label('TIPO_LESAO_DESCRICAO' , trans('messages.tit_tipo_lesao')) !!}
                {!! Form::text ('TIPO_LESAO_DESCRICAO', $dmatend['TIPO_LESAO_DESCRICAO'],
                    ['class'=>'form-control'
                    , 'readonly' =>'true'
                    , 'id'=>'TIPO_LESAO_DESCRICAO'
                    ]) !!}
            </div>

            <div class="form-group col-lg-3">
                {!! Form::label('PARTE_CORPO_DESCRICAO' , trans('messages.tit_parte_corpo')) !!}
                {!! Form::text ('PARTE_CORPO_DESCRICAO', $dmatend['PARTE_CORPO_DESCRICAO'],
                    ['class'=>'form-control'
                    , 'readonly' =>'true'
                    , 'id'=>'PARTE_CORPO_DESCRICAO'
                    ]) !!}
            </div>

            <div class="form-group col-lg-3">
                {!! Form::label('NOME_MEDICO' , trans('messages.tit_medico')) !!}
                {!! Form::text ('NOME_MEDICO', $dmatend['NOME_MEDICO'],
                    ['class'=>'form-control'
                    , 'readonly' =>'true'
                    , 'id'=>'NOME_MEDICO'
                    ]) !!}
            </div>
        </div>
    </div>
</div>
