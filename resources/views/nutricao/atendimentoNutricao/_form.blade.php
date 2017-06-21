{!! Form::hidden('ID_ATENDIMENTO_NUTRICAO', null, ['class'=>'form-control', 'id'=>'ID_ATENDIMENTO_NUTRICAO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">
    <div class="form-group col-lg-2">
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
    <div class="form-group col-lg-5">
        {!! Form::label('ID_ORIGEM_NUTRICAO' , trans('messages.tit_origematendimento')) !!}
        {!! Form::select('ID_ORIGEM_NUTRICAO', $origem, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('ID_ATIV_NUTRICAO' , trans('messages.tit_motivoatendimento')) !!}
        {!! Form::select('ID_ATIV_NUTRICAO', $atividade, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('ID_JOGADOR' , trans('messages.tit_jogador')) !!}
        {!! Form::select('ID_JOGADOR', $jogadores, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-2">
        {!! Form::label('JOG_PESO', trans('messages.tit_peso')) !!}
        {!! Form::text ('JOG_PESO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
    </div>
    <div class="form-group col-lg-2">
        {!! Form::label('JOG_PERC_GORDURA', trans('messages.tit_perc_gordura')) !!}
        {!! Form::text ('JOG_PERC_GORDURA', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
    </div>
    <div class="form-group col-lg-2">
        {!! Form::label('JOG_ALTURA', trans('messages.tit_altura')) !!}
        {!! Form::text ('JOG_ALTURA', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
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
