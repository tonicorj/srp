{!! Form::hidden('ID_CONDICAO_GRAMADO', null, ['class'=>'form-control', 'id'=>'ID_CONDICAO_GRAMADO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('CONDICAO_GRAMADO', trans('messages.tit_condicaogramado')) !!}
        {!! Form::text ('CONDICAO_GRAMADO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'CONDICAO_GRAMADO'
            ]) !!}
    </div>
</div>

