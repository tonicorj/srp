{!! Form::hidden('ID_ACOMPANHAMENTO_DM', null, ['class'=>'form-control', 'id'=>'ID_ACOMPANHAMENTO_DM']) !!}
{!! Form::hidden('ID_DEPARTAMENTO_MEDICO', $dmatend->ID_DEPARTAMENTO_MEDICO, ['class'=>'form-control']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-lg-2">
        {!! Form::label('ACOMPANHAMENTO_DATA_S', trans('messages.tit_dmAcompanha_data')) !!}
        <div class="input-group date" id="DM_DATA_INICIO_S">
            {!! Form::text ('ACOMPANHAMENTO_DATA_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'ACOMPANHAMENTO_DATA_S'
                , 'required'=>''
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('ID_MEDICO' , trans('messages.tit_medico')) !!}
        {!! Form::select('ID_MEDICO', $medicos, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('ACOMPANHAMENTO_OBS' , trans('messages.tit_dmAcompanha_obs')) !!}
        {!! Form::textarea('ACOMPANHAMENTO_OBS', null, ['class'=>'form-control input-md']) !!}
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
