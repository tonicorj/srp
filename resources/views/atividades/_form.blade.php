{!! Form::hidden('ID_ATIVIDADE', null, ['class'=>'form-control', 'id'=>'ID_ATIVIDADE']) !!}

<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('atividade_descricao', trans('messages.tit_atividade')) !!}
        {!! Form::text ('ATIVIDADE_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'ATIVIDADE_DESCRICAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>

