{!! Form::hidden('ID_ACOMPANHAMENTO_DM', null, ['class'=>'form-control', 'id'=>'ID_ACOMPANHAMENTO_DM']) !!}
{!! Form::hidden('ID_DEPARTAMENTO_MEDICO', $dmatend->ID_DEPARTAMENTO_MEDICO, ['class'=>'form-control']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-lg-2">
        {!! Form::label('DATA_PRONTUARIO_S', trans('messages.tit_prontuario_data')) !!}
        <div class="input-group date" id="PRONTUARIO_DATA_S">
            {!! Form::text ('DATA_PRONTUARIO_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'DATA_PRONTUARIO_S'
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
        {!! Form::label('TXT_QUEIXA_PRINCIPAL' , trans('messages.tit_prontuario_queixa')) !!}
        {!! Form::textarea('TXT_QUEIXA_PRINCIPAL', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('TXT_HISTORIA_CLINICA' , trans('messages.tit_prontuario_historia')) !!}
        {!! Form::textarea('TXT_HISTORIA_CLINICA', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('TXT_EXAME_FISICO' , trans('messages.tit_prontuario_exame')) !!}
        {!! Form::textarea('TXT_EXAME_FISICO', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('TXT_SUSPEITA' , trans('messages.tit_prontuario_suspeita')) !!}
        {!! Form::textarea('TXT_SUSPEITA', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('TXT_EXAMES_COMPLEMENTARES' , trans('messages.tit_prontuario_complementos')) !!}
        {!! Form::textarea('TXT_EXAMES_COMPLEMENTARES', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('TXT_DIAGNOSTICO' , trans('messages.tit_prontuario_diagnostico')) !!}
        {!! Form::textarea('TXT_DIAGNOSTICO', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('TXT_TRATAMENTO' , trans('messages.tit_prontuario_tratamento')) !!}
        {!! Form::textarea('TXT_TRATAMENTO', null, ['class'=>'form-control input-md']) !!}
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
