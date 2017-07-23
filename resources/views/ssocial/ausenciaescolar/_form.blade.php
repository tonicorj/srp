{!! Form::hidden('ID_PRESENCA', null, ['class'=>'form-control', 'id'=>'ID_PRESENCA']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('PRESENCA_DATA_S', trans('messages.tit_ausencia_data')) !!}
        <div class="input-group date" id="VISITA_DATA_S">
            {!! Form::text ('PRESENCA_DATA_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'PRESENCA_DATA_S'
                , 'required'=>''
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>

    <div class="form-group col-lg-10">
        {!! Form::label('ID_MOTIVO_AUSENCIA_ESCOLAR' , trans('messages.tit_motivoausencia_descricao')) !!}
        {!! Form::select('ID_MOTIVO_AUSENCIA_ESCOLAR', $motivo, null, ['class'=>'form-control input-md', 'required' => 'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('ID_JOGADOR' , trans('messages.tit_jogador')) !!}
        {!! Form::select('ID_JOGADOR', $jogadores, null, ['class'=>'form-control input-md', 'required' => 'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('FALTA_OBSERVACAO' , trans('messages.tit_ausenciaobs')) !!}
        {!! Form::text('FALTA_OBSERVACAO', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                {!! trans('messages.tit_ausenciaoutros') !!}
            </div>
            <div class="panel-body">
                <div class="form-group col-lg-6">
                    {{ Form::checkbox('FLAG_DISPENSA') }}
                    {!! Form::label('FLAG_DISPENSA' , trans('messages.tit_ausenciadispensa')) !!}
                </div><!-- /.col-lg-6 -->
                <div class="form-group col-lg-6">
                    {{ Form::checkbox('FLAG_ATRASO') }}
                    {!! Form::label('FLAG_ATRASO' , trans('messages.tit_ausenciaatraso')) !!}
                </div><!-- /.col-lg-6 -->
            </div>
        </div>
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
