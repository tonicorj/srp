{!! Form::hidden('ID_ATENDIMENTO_PSICOLOGIA', null, ['class'=>'form-control', 'id'=>'ID_ATENDIMENTO_PSICOLOGIA']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-lg-4">
        {!! Form::label('ATENDIMENTO_DATA_S', trans('messages.tit_visitadata')) !!}
        <div class="input-group date" id="VISITA_DATA_S">
            {!! Form::text ('ATENDIMENTO_DATA_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'ATENDIMENTO_DATA_S'
                , 'required'=>'true'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-8">
        {!! Form::label('ID_ORIGEM_PSICOLOGIA' , trans('messages.tit_origematendimento')) !!}
        {!! Form::select('ID_ORIGEM_PSICOLOGIA', $origem, null, ['class'=>'form-control input-md', 'required'=>'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-8">
        {!! Form::label('ID_ATIV_PSICOLOGIA' , trans('messages.tit_motivoatendimento')) !!}
        {!! Form::select('ID_ATIV_PSICOLOGIA', $atividade, null, ['class'=>'form-control input-md', 'required'=>'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
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
