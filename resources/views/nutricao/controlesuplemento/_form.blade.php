{!! Form::hidden('ID_CONTROLE_SUPLEMENTO', null, ['class'=>'form-control', 'id'=>'ID_CONTROLE_SUPLEMENTO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('CONTROLE_DATA_S', trans('messages.tit_controledata')) !!}
        <div class="input-group date" id="CONTROLE_DATA_S">
            {!! Form::text ('CONTROLE_DATA_S', null,
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
    <div class="form-group col-lg-9">
        {!! Form::label('ID_JOGADOR' , trans('messages.tit_jogador')) !!}
        {!! Form::select('ID_JOGADOR', $jogadores, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-9">
        {!! Form::label('ID_SUPLEMENTO' , trans('messages.tit_suplemento')) !!}
        {!! Form::select('ID_SUPLEMENTO', $suplemento, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('QTD_ENTREGUE' , trans('messages.tit_qtdentregue')) !!}
        {!! Form::text('QTD_ENTREGUE', null, ['class'=>'form-control input-md', 'style' => 'width:50%']) !!}
    </div>

    <div class="form-group col-lg-3">
        {!! Form::label('QTD_DIARIA' , trans('messages.tit_qtddiaria')) !!}
        {!! Form::text('QTD_DIARIA', null, ['class'=>'form-control input-md', 'style' => 'width:50%']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-12">
        {!! Form::label('CONTROLE_DESCRICAO' , trans('messages.tit_observacao')) !!}
        {!! Form::textarea('CONTROLE_DESCRICAO', null, ['class'=>'form-control input-md']) !!}
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
