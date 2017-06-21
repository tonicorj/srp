{!! Form::hidden('ID_DM_EXAME', null, ['class'=>'form-control', 'id'=>'ID_DM_EXAME']) !!}
{!! Form::hidden('ID_DEPARTAMENTO_MEDICO', $dmatend->ID_DEPARTAMENTO_MEDICO, ['class'=>'form-control']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-lg-2">
        {!! Form::label('EXAME_DATA_S', trans('messages.tit_dmexame_data')) !!}
        <div class="input-group date" id="EXAME_DATA_S">
            {!! Form::text ('EXAME_DATA_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'EXAME_DATA_S'
                , 'required'=>''
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('ID_EXAME' , trans('messages.tit_exames')) !!}
        {!! Form::select('ID_EXAME', $exames, null, ['class'=>'form-control input-md', 'required'=>'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('ID_MEDICO' , trans('messages.tit_medico')) !!}
        {!! Form::select('ID_MEDICO', $medicos, null, ['class'=>'form-control input-md', 'required'=>'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-2">
        {!! Form::label('EXAME_DATA_REALIZADO_S', trans('messages.tit_dmexame_data_realizado')) !!}
        <div class="input-group date" id="EXAME_DATA_REALIZADO_S">
            {!! Form::text ('EXAME_DATA_REALIZADO_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'EXAME_DATA_REALIZADO_S'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('EXAME_LAUDO' , trans('messages.tit_dmexame_laudo')) !!}
        {!! Form::textarea('EXAME_LAUDO', null, ['class'=>'form-control input-md']) !!}
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
