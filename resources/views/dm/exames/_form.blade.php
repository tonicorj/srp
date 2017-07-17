{!! Form::hidden('ID_EXAME', null, ['class'=>'form-control', 'id'=>'ID_EXAME']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-11">
        {!! Form::label('EXAME_NOME', trans('messages.tit_exames')) !!}
        {!! Form::text ('EXAME_NOME', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'EXAME_NOME'
            ]) !!}
    </div>
</div>

