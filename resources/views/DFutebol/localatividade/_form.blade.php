{!! Form::hidden('ID_LOCAL_ATIVIDADE', null, ['class'=>'form-control', 'id'=>'ID_LOCAL_ATIVIDADE']) !!}

<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('LOCAL_ATIVIDADE_DESCRICAO', trans('messages.tit_cargo')) !!}
        {!! Form::text ('LOCAL_ATIVIDADE_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'LOCAL_ATIVIDADE_DESCRICAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>

