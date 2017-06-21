{!! Form::hidden('POSICAO', null, ['class'=>'form-control', 'id'=>'POSICAO']) !!}

<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('POSICAO', 'Posição') !!}
        {!! Form::text ('POSICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'4'
            , 'id'=>'POSICAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-5">
        {!! Form::label('posicao_descricao', 'Descrição') !!}
        {!! Form::text ('POSICAO_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'40'
            , 'id'=>'POSICAO_DESCRICAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('posicao_ordem', 'Ordem') !!}
        {!! Form::text ('POSICAO_ORDEM', null,
            ['class'=>'form-control'
            , 'maxlength' =>'2'
            , 'id'=>'POSICAO_ORDEM'
            , 'required'=>''
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="row">
        <div class="form-group col-sm-2">
            {!! Form::label('posicao_campo', 'Campo') !!}
            {!! Form::text ('POSICAO_CAMPO', null,
                ['class'=>'form-control'
                , 'maxlength' =>'2'
                , 'id'=>'POSICAO_CAMPO'
                , 'required'=>''
                ]) !!}
        </div>
    </div>
</div>


