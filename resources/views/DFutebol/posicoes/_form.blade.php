{!! Form::hidden('POSICAO', null, ['class'=>'form-control', 'id'=>'POSICAO']) !!}

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('POSICAO', trans('messages.tit_posicao_sigla')) !!}
        {!! Form::text ('POSICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'4'
            , 'id'=>'POSICAO'
            , 'required'=>''
            , 'style'=>'width:25%'
            ]) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-10">
        {!! Form::label('posicao_descricao', trans('messages.tit_posicao')) !!}
        {!! Form::text ('POSICAO_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'40'
            , 'id'=>'POSICAO_DESCRICAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-5">
        {!! Form::label('posicao_ordem', trans('messages.tit_posicao_ordem')) !!}
        {!! Form::text ('POSICAO_ORDEM', null,
            ['class'=>'form-control'
            , 'maxlength' =>'2'
            , 'id'=>'POSICAO_ORDEM'
            , 'style'=>'width:25%'
            , 'required'=>''
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-5">
        {!! Form::label('posicao_campo', trans('messages.tit_posicao_campo')) !!}
        {!! Form::text ('POSICAO_CAMPO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'2'
            , 'id'=>'POSICAO_CAMPO'
            , 'style'=>'width:25%'
            , 'required'=>''
            ]) !!}
    </div>
</div>


