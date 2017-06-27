{!! Form::hidden('ID_', null, ['class'=>'form-control', 'id'=>'ID_SELECAO']) !!}

<div class="row">

    <div class="form-group col-sm-10">
        {!! Form::label('DESCRICAO_SELECAO', trans('messages.tit_selecao')) !!}
        {!! Form::text ('DESCRICAO_SELECAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'DESCRICAO_SELECAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>

