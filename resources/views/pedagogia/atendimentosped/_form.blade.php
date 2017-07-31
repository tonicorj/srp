{!! Form::hidden('ID_ATENDIMENTO_PEDAGOGIA', null, ['class'=>'form-control', 'id'=>'ID_ATENDIMENTO_PEDAGOGIA']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('VISITA_DATA_S', trans('messages.tit_visitadata')) !!}
        <div class="input-group date" id="VISITA_DATA_S">
            {!! Form::text ('VISITA_DATA_S', null,
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
    <div class="form-group col-lg-5">
        {!! Form::label('ID_ORIGEM_PEDAGOGIA' , trans('messages.tit_origematendimento')) !!}
        {!! Form::select('ID_ORIGEM_PEDAGOGIA', $origem, null, ['class'=>'form-control input-md', 'required' => 'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('ID_ATIV_PEDAGOGIA' , trans('messages.tit_motivoatendimento')) !!}
        {!! Form::select('ID_ATIV_PEDAGOGIA', $atividade, null, ['class'=>'form-control input-md', 'required' => 'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('ID_JOGADOR' , trans('messages.tit_jogador')) !!}
        {!! Form::select('ID_JOGADOR', $jogadores, null, ['class'=>'form-control input-md', 'required' => 'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-11">
        {!! Form::label('OBS_ATIVIDADE' , trans('messages.tit_obsatendimento')) !!}
        {!! Form::textarea('OBS_ATIVIDADE', null, ['class'=>'form-control input-md']) !!}
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
