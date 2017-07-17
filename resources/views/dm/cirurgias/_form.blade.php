{!! Form::hidden('ID_CIRURGIA', null, ['class'=>'form-control', 'id'=>'ID_CIRURGIA']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-11">
        {!! Form::label('CIRURGIA_NOME', trans('messages.tit_cirurgia')) !!}
        {!! Form::text ('CIRURGIA_NOME', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'CIRURGIA_NOME'
            ]) !!}
    </div>
</div>

