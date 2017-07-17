{!! Form::hidden('ID_DM_CIRURGIA', null, ['class'=>'form-control', 'id'=>'ID_DM_CIRURGIA']) !!}
{!! Form::hidden('ID_DEPARTAMENTO_MEDICO', $dmatend->ID_DEPARTAMENTO_MEDICO, ['class'=>'form-control']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-lg-2">
        {!! Form::label('CIRURGIA_DATA_SOLICITACAO_S', trans('messages.tit_dmcirurgia_data')) !!}
        <div class="input-group date" id="CIRURGIA_DATA_SOLICITACAO_S">
            {!! Form::text ('CIRURGIA_DATA_SOLICITACAO_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'CIRURGIA_DATA_SOLICITACAO_S'
                , 'required'=>''
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-2">
        {!! Form::label('CIRURGIA_DATA_S', trans('messages.tit_dmcirurgia_data_realizado')) !!}
        <div class="input-group date" id="CIRURGIA_DATA_S">
            {!! Form::text ('CIRURGIA_DATA_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'CIRURGIA_DATA_S'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('ID_CIRURGIA' , trans('messages.tit_cirurgia')) !!}
        {!! Form::select('ID_CIRURGIA', $cirurgias, null, ['class'=>'form-control input-md', 'required'=>'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('ID_MEDICO' , trans('messages.tit_medico')) !!}
        {!! Form::select('ID_MEDICO', $medicos, null, ['class'=>'form-control input-md', 'required'=>'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('CIRURGIA_LAUDO' , trans('messages.tit_dmexame_laudo')) !!}
        {!! Form::textarea('CIRURGIA_LAUDO', null, ['class'=>'form-control input-md']) !!}
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
