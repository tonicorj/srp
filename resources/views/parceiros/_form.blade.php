{!! Form::hidden('ID_PARCEIRO', null, ['class'=>'form-control', 'id'=>'ID_PARCEIRO']) !!}

<div class="row">
    <div class="form-group col-sm-5">
        {!! Form::label('parceiro_nome', 'Parceiro') !!}
        {!! Form::text ('PARCEIRO_NOME', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'PARCEIRO_NOME'
            , 'required'=>''
            ]) !!}
    </div>

    <div class="form-group col-sm-1">
        {!! Form::label('parceiro_prioridade', 'Prioridade') !!}
        {!! Form::text ('PARCEIRO_PRIORIDADE', null,
            ['class'=>'form-control'
            , 'id'=>'PARCEIRO_PRIORIDADE'
            ]) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('nome_contato_parceiro', 'Contato') !!}
        {!! Form::text ('NOME_CONTATO_PARCEIRO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'200'
            , 'id'=>'NOME_CONTATO_PARCEIRO'
            , 'required'=>''
            ]) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('parceiro_telefone', 'Telefone') !!}
        {!! Form::text ('PARCEIRO_TELEFONE', null,
            ['class'=>'form-control'
            , 'maxlength' =>'60'
            , 'id'=>'PARCEIRO_TELEFONE'
            ]) !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('parceiro_celular', 'Celular') !!}
        {!! Form::text ('PARCEIRO_CELULAR', null,
            ['class'=>'form-control'
            , 'maxlength' =>'60'
            , 'id'=>'PARCEIRO_CELULAR'
            ]) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('parceiro_mail', 'E-mail') !!}
        {!! Form::text ('PARCEIRO_MAIL', null,
            ['class'=>'form-control'
            , 'maxlength' =>'200'
            , 'id'=>'PARCEIRO_MAIL'
            ]) !!}
    </div>

</div>

