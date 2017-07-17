{!! Form::hidden('ID_DEPARTAMENTO_MEDICO', null, ['class'=>'form-control', 'id'=>'ID_DEPARTAMENTO_MEDICO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('ID_JOGADOR' , trans('messages.tit_jogador')) !!}
        {!! Form::select('ID_JOGADOR', $jogadores, null, ['class'=>'form-control input-md']) !!}
    </div>
    <div class="form-group col-lg-3">
        {!! Form::label('DM_DATA_INICIO_S', trans('messages.tit_depmedico_inicio')) !!}
        <div class="input-group date" id="DM_DATA_INICIO_S">
            {!! Form::text ('DM_DATA_INICIO_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'DM_DATA_INICIO_S'
                , 'required'=>''
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
    <div class="form-group col-lg-3">
        {!! Form::label('DM_DATA_FIM_S', trans('messages.tit_depmedico_fim')) !!}
        <div class="input-group date" id="DM_DATA_FIM_S">
            {!! Form::text ('DM_DATA_FIM_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'DM_DATA_FIM_S'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('ID_ORIGEM_LESAO' , trans('messages.tit_origem_lesao')) !!}
        {!! Form::select('ID_ORIGEM_LESAO', $origem_lesao, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('ID_TIPO_LESAO' , trans('messages.tit_tipo_lesao')) !!}
        {!! Form::select('ID_TIPO_LESAO', $tipo_lesao, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('ID_PARTE_CORPO' , trans('messages.tit_parte_corpo')) !!}
        {!! Form::select('ID_PARTE_CORPO', $parte_corpo, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('ID_MEDICO' , trans('messages.tit_medico')) !!}
        {!! Form::select('ID_MEDICO', $medicos, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-11">
        {!! Form::label('DM_OBSERVACAO' , trans('messages.tit_obsatendimento')) !!}
        {!! Form::textarea('DM_OBSERVACAO', null, ['class'=>'form-control input-md']) !!}
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
