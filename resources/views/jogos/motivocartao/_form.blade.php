{!! Form::hidden('ID_MOTIVOCARTAO', null, ['class'=>'form-control', 'id'=>'ID_MOTIVOCARTAO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('MOTIVO_CARTAO', trans('messages.tit_motivocartao')) !!}
        {!! Form::text ('MOTIVO_CARTAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'MOTIVO_CARTAO'
            ]) !!}
    </div>
</div>

