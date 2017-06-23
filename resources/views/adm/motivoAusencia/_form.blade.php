{!! Form::hidden('ID_MOTIVO_AUSENCIA', null, ['class'=>'form-control', 'id'=>'ID_MOTIVO_AUSENCIA']) !!}

<div class="row">
    <div class="form-group col-sm-7">
        {!! Form::label('MOTIVO_AUSENCIA_DESCRICAO', 'Motivo de Ausência') !!}
        {!! Form::text ('MOTIVO_AUSENCIA_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'MOTIVO_AUSENCIA_DESCRICAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-1">
        {!! Form::label('MOTIVO_AUSENCIA_LETRA', 'Letra') !!}
        {!! Form::text ('MOTIVO_AUSENCIA_LETRA', null,
            ['class'=>'form-control'
            , 'maxlength' =>'1'
            , 'id'=>'MOTIVO_AUSENCIA_LETRA'
            , 'required'=>''
            ]) !!}
    </div>

</div>

