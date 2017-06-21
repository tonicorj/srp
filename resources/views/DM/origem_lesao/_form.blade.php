{!! Form::hidden('ID_ORIGEM_LESAO', null, ['class'=>'form-control', 'id'=>'ID_ORIGEM_LESAO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('ORIGEM_LESAO_DESCRICAO', trans('messages.tit_origem_lesao')) !!}
        {!! Form::text ('ORIGEM_LESAO_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'ORIGEM_LESAO_DESCRICAO'
            ]) !!}
    </div>
</div>

