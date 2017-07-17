{!! Form::hidden('ID_CAMPEONATO', null, ['class'=>'form-control', 'id'=>'ID_CAMPEONATO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">
    <div class="form-group col-lg-9">
        {!! Form::label('ID_TIPOCAMP' , trans('messages.tit_tipocampeonato')) !!}
        {!! Form::select('ID_TIPOCAMP', $tipocamp, null, ['class'=>'form-control input-md']) !!}
    </div>

    <div class="form-group col-lg-3">
        {!! Form::label('CAMP_ANO', trans('messages.tit_camp_ano')) !!}
        {!! Form::text ('CAMP_ANO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
    </div>

</div>

<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('ID_CATEGORIA' , trans('messages.tit_categoria')) !!}
        {!! Form::select('ID_CATEGORIA', $categorias, null, ['class'=>'form-control input-md']) !!}
    </div>

    <div class="form-group col-lg-6">
        {!! Form::label('ID_PONTUACAO' , trans('messages.tit_pontuacao')) !!}
        {!! Form::select('ID_PONTUACAO', $pontuacao, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {!! Form::label('CAMP_DATA_INICIAL_S', trans('messages.tit_camp_data_inicial')) !!}
        <div class="input-group date" id="CAMP_DATA_INICIAL_S">
            {!! Form::text ('CAMP_DATA_INICIAL_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'CAMP_DATA_INICIAL_S'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>

    <div class="form-group col-lg-4">
        {!! Form::label('CAMP_DATA_FINAL_S', trans('messages.tit_camp_data_final')) !!}
        <div class="input-group date" id="CAMP_DATA_FINAL_S">
            {!! Form::text ('CAMP_DATA_FINAL_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'CAMP_DATA_FINAL_S'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>

    <div class="form-group col-lg-4">
        {!! Form::label('CAMP_DATA_INSCRICAO_S', trans('messages.tit_camp_data_inscricao')) !!}
        <div class="input-group date" id="CAMP_DATA_INSCRICAO_S">
            {!! Form::text ('CAMP_DATA_INSCRICAO_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'CAMP_DATA_INSCRICAO_S'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('ID_CRITERIO_01' , '1º ' . trans('messages.tit_criterio')) !!}
        {!! Form::select('ID_CRITERIO_01', $criterios, null, ['class'=>'form-control input-md']) !!}
    </div>

    <div class="form-group col-lg-6">
        {!! Form::label('ID_CRITERIO_02' , '2º ' . trans('messages.tit_criterio')) !!}
        {!! Form::select('ID_CRITERIO_02', $criterios, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('ID_CRITERIO_03' , '3º ' . trans('messages.tit_criterio')) !!}
        {!! Form::select('ID_CRITERIO_03', $criterios, null, ['class'=>'form-control input-md']) !!}
    </div>

    <div class="form-group col-lg-6">
        {!! Form::label('ID_CRITERIO_04' , '4º ' . trans('messages.tit_criterio')) !!}
        {!! Form::select('ID_CRITERIO_04', $criterios, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {!! Form::label('TMP_PARTIDA', trans('messages.tit_camp_tempo_partida')) !!}
        {!! Form::text ('TMP_PARTIDA', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
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
