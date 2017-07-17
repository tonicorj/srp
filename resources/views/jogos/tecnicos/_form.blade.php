{!! Form::hidden('ID_TECNICO', null, ['class'=>'form-control', 'id'=>'ID_TECNICO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('TECNICO_NOME', trans('messages.tit_tecnico')) !!}
        {!! Form::text ('TECNICO_NOME', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'TECNICO_NOME'
            ]) !!}
    </div>
</div>

