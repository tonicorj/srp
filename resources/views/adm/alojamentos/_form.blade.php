{!! Form::hidden('ID_ALOJAMENTO', null, ['class'=>'form-control', 'id'=>'ID_ALOJAMENTO']) !!}

<div class="row">
    <div class="row">
        <div class="form-group col-sm-7">
            {!! Form::label('alojamento_nome', trans('messages.tit_alojamento')) !!}
            {!! Form::text ('ALOJAMENTO_NOME', null,
                ['class'=>'form-control'
                , 'maxlength' =>'50'
                , 'id'=>'ALOJAMENTO_NOME'
                , 'required'=>''
                ]) !!}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-2">
            {!! Form::label('alojamento_qtd_vagas', trans('messages.tit_qtdvagas')) !!}
            {!! Form::text ('ALOJAMENTO_QTD_VAGAS', null,
                ['class'=>'form-control'
                , 'id'=>'ALOJAMENTO_QTD_VAGAS'
                , 'required'=>''
                ]) !!}
        </div>
    </div>
</div>

