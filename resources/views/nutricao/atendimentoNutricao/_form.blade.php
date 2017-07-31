{!! Form::hidden('ID_ATENDIMENTO_NUTRICAO', null, ['class'=>'form-control', 'id'=>'ID_ATENDIMENTO_NUTRICAO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('ATENDIMENTO_DATA_S', trans('messages.tit_visitadata')) !!}
        <div class="input-group date" id="VISITA_DATA_S">
            {!! Form::text ('ATENDIMENTO_DATA_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'VISITA_DATA_S'
                , 'required'=>''
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-9">
        {!! Form::label('ID_ORIGEM_NUTRICAO' , trans('messages.tit_origematendimento')) !!}
        {!! Form::select('ID_ORIGEM_NUTRICAO', $origem, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-9">
        {!! Form::label('ID_ATIV_NUTRICAO' , trans('messages.tit_motivoatendimento')) !!}
        {!! Form::select('ID_ATIV_NUTRICAO', $atividade, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-9">
        {!! Form::label('ID_JOGADOR' , trans('messages.tit_jogador')) !!}
        {!! Form::select('ID_JOGADOR', $jogadores, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_peso_altura') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-3">
                        {!! Form::label('JOG_ALTURA', trans('messages.tit_altura')) !!}
                        {!! Form::text ('JOG_ALTURA', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('JOG_PESO', trans('messages.tit_peso')) !!}
                        {!! Form::text ('JOG_PESO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('JOG_PESO_GORDO', trans('messages.tit_pesogordo')) !!}
                        {!! Form::text ('JOG_PESO_GORDO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('JOG_PESO_MAGRO', trans('messages.tit_pesomagro')) !!}
                        {!! Form::text ('JOG_PESO_MAGRO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        {!! Form::label('JOG_PERC_GORDURA', trans('messages.tit_perc_gordura')) !!}
                        {!! Form::text ('JOG_PERC_GORDURA', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('JOG_PESO_IDEAL', trans('messages.tit_pesoideal')) !!}
                        {!! Form::text ('JOG_PESO_IDEAL', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('JOG_IMC', trans('messages.tit_imc')) !!}
                        {!! Form::text ('JOG_IMC', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_composicaocorporal') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-3">
                        {!! Form::label('COMPOSICAOCORP_ABDOMEN', trans('messages.tit_cc_abdomen')) !!}
                        {!! Form::text ('COMPOSICAOCORP_ABDOMEN', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('COMPOSICAOCORP_SUPILIACA', trans('messages.tit_cc_supiliaca')) !!}
                        {!! Form::text ('COMPOSICAOCORP_SUPILIACA', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('COMPOSICAOCORP_SUBESCAPULAR', trans('messages.tit_cc_subescapular')) !!}
                        {!! Form::text ('COMPOSICAOCORP_SUBESCAPULAR', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('COMPOSICAOCORP_TRICEPS', trans('messages.tit_cc_triceps')) !!}
                        {!! Form::text ('COMPOSICAOCORP_TRICEPS', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        {!! Form::label('COMPOSICAOCORP_BICEPS', trans('messages.tit_cc_biceps')) !!}
                        {!! Form::text ('COMPOSICAOCORP_BICEPS', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('COMPOSICAOCORP_SUPESC', trans('messages.tit_cc_supesc')) !!}
                        {!! Form::text ('COMPOSICAOCORP_SUPESC', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('COMPOSICAOCORP_AXILMEDIA', trans('messages.tit_cc_axilmedia')) !!}
                        {!! Form::text ('COMPOSICAOCORP_AXILMEDIA', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        {!! Form::label('COMPOSICAOCORP_TX', trans('messages.tit_cc_tx')) !!}
                        {!! Form::text ('COMPOSICAOCORP_TX', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('COMPOSICAOCORP_CX', trans('messages.tit_cc_cx')) !!}
                        {!! Form::text ('COMPOSICAOCORP_CX', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('COMPOSICAOCORP_PAN', trans('messages.tit_cc_pan')) !!}
                        {!! Form::text ('COMPOSICAOCORP_PAN', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_balanco') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-3">
                        {!! Form::label('BALANCOK_NCB', trans('messages.tit_balanco_af')) !!}
                        {!! Form::text ('BALANCOK_NCB', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('BALANCOK_AF', trans('messages.tit_balanco_ncb')) !!}
                        {!! Form::text ('BALANCOK_AF', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('BALANCOK_NCT', trans('messages.tit_balanco_nct')) !!}
                        {!! Form::text ('BALANCOK_NCT', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        {!! Form::label('BALANCOK_PRESCRICAO', trans('messages.tit_balanco_prescricao')) !!}
                        {!! Form::text ('BALANCOK_PRESCRICAO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('BALANCOK_RESTRICAO', trans('messages.tit_balanco_restricao')) !!}
                        {!! Form::text ('BALANCOK_RESTRICAO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-12">
        {!! Form::label('ATENDIMENTO_OBS' , trans('messages.tit_obsatendimento')) !!}
        {!! Form::textarea('ATENDIMENTO_OBS', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#form_ .date').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            autoclose: true,
            todayHighlight: true
        });
    });
</script>
