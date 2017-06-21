{!! Form::hidden('ID_ORIGEM_PSICOLOGIA', null, ['class'=>'form-control', 'id'=>'ID_ORIGEM_PSICOLOGIA']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('ORIGEM_PSICOLOGIA_DESCRICAO', trans('messages.tit_origempsicologia')) !!}
        {!! Form::text ('ORIGEM_PSICOLOGIA_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'ORIGEM_PSICOLOGIA_DESCRICAO'
            ]) !!}
    </div>
</div>

