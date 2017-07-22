{!! Form::hidden('ID_MOTIVO_AFASTAMENTO', null, ['class'=>'form-control', 'id'=>'ID_MOTIVO_AFASTAMENTO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('MOTIVO_AFASTAMENTO_DESCRICAO', trans('messages.tit_motivoafastamento')) !!}
        {!! Form::text ('MOTIVO_AFASTAMENTO_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'MOTIVO_AFASTAMENTO_DESCRICAO'
            ]) !!}
    </div>
</div>

