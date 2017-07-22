{!! Form::hidden('ID_ORIGEM_SERVSOCIAL', null, ['class'=>'form-control', 'id'=>'ID_ORIGEM_SERVSOCIAL']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-11">
        {!! Form::label('ORIGEM_SERVSOCIAL_DESCRICAO', trans('messages.tit_origemservsocial')) !!}
        {!! Form::text ('ORIGEM_SERVSOCIAL_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'ORIGEM_SERVSOCIAL_DESCRICAO'
            ]) !!}
    </div>
</div>

