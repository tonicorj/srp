{!! Form::hidden('ID_AFASTAMENTO', null, ['class'=>'form-control', 'id'=>'ID_AFASTAMENTO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">
    <div class="form-group col-lg-8">
        {!! Form::label('ID_JOGADOR' , trans('messages.tit_jogador')) !!}
        {!! Form::select('ID_JOGADOR', $jogadores, null, ['class'=>'form-control input-md']) !!}
    </div>

</div>

<div class="row">
    <div class="form-group col-lg-8">
        {!! Form::label('ID_MOTIVO_AFASTAMENTO' , trans('messages.tit_motivoafastamento')) !!}
        {!! Form::select('ID_MOTIVO_AFASTAMENTO', $motivos, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('DATA_SAIDA_S', trans('messages.tit_datasaida')) !!}
        <div class="input-group date" id="DATA_SAIDA_S">
            {!! Form::text ('DATA_SAIDA_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'DATA_SAIDA_S'
                , 'required'=>'true'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>

    <div class="form-group col-lg-3">
        {!! Form::label('DATA_RETORNO_S', trans('messages.tit_dataretorno_prev')) !!}
        <div class="input-group date" id="DATA_RETORNO_S">
            {!! Form::text ('DATA_RETORNO_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'DATA_RETORNO_S'
                , 'required'=>'true'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>

    <div class="form-group col-lg-3">
        {!! Form::label('DATA_RETORNO_REAL_S', trans('messages.tit_dataretorno_real')) !!}
        <div class="input-group date" id="DATA_RETORNO_REAL_S">
            {!! Form::text ('DATA_RETORNO_REAL_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'DATA_RETORNO_REAL_S'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-9">
        {!! Form::label('AFASTAMENTO_OBS', trans('messages.tit_observacao')) !!}
        {!! Form::text ('AFASTAMENTO_OBS', null, ['class'=>'form-control']) !!}
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
