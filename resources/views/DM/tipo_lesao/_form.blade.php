{!! Form::hidden('ID_TIPO_LESAO', null, ['class'=>'form-control', 'id'=>'ID_TIPO_LESAO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('TIPO_LESAO_DESCRICAO', trans('messages.tit_tipo_lesao')) !!}
        {!! Form::text ('TIPO_LESAO_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'TIPO_LESAO_DESCRICAO'
            ]) !!}
    </div>
</div>

