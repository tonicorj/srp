{!! Form::hidden('ID_ORIGEM_NUTRICAO', null, ['class'=>'form-control', 'id'=>'ID_ORIGEM_NUTRICAO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('ORIGEM_NUTRICAO_DESCRICAO', trans('messages.tit_origemnutricao')) !!}
        {!! Form::text ('ORIGEM_NUTRICAO_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'ORIGEM_NUTRICAO_DESCRICAO'
            ]) !!}
    </div>
</div>

