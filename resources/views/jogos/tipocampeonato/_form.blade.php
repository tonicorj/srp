{!! Form::hidden('ID_TIPOCAMP', null, ['class'=>'form-control', 'id'=>'ID_TIPOCAMP']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('TCAMP_DESCRICAO', trans('messages.tit_tipocampeonato')) !!}
        {!! Form::text ('TCAMP_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'TCAMP_DESCRICAO'
            ]) !!}
    </div>
</div>

