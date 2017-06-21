{!! Form::hidden('ID_MOTIVO_AUSENCIA_ESCOLAR', null, ['class'=>'form-control', 'id'=>'ID_MOTIVO_AUSENCIA_ESCOLAR']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-sm-7">
        {!! Form::label('MOTIVO_AUSENCIA_DESCRICAO', trans('messages.tit_motivoausencia_descricao')) !!}
        {!! Form::text ('MOTIVO_AUSENCIA_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'MOTIVO_AUSENCIA_DESCRICAO'
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('MOTIVO_AUSENCIA_LETRA', trans('messages.tit_motivoausencia_letra')) !!}
        {!! Form::text('MOTIVO_AUSENCIA_LETRA', null,
            ['class'=>'form-control'
            , 'maxlength' =>'1'
            , 'id'=>'MOTIVO_AUSENCIA_LETRA'
            ]) !!}
    </div>
</div>


