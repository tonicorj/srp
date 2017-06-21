{!! Form::hidden('ID_PARTE_CORPO', null, ['class'=>'form-control', 'id'=>'ID_PARTE_CORPO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('PARTE_CORPO_DESCRICAO', trans('messages.tit_parte_corpo')) !!}
        {!! Form::text ('PARTE_CORPO_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'PARTE_CORPO_DESCRICAO'
            ]) !!}
    </div>
</div>

