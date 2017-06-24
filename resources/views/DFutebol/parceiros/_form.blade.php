{!! Form::hidden('ID_PARCEIRO', null, ['class'=>'form-control', 'id'=>'ID_PARCEIRO']) !!}

<div class="row">
    <div class="form-group col-sm-10">
        {!! Form::label('parceiro_nome', trans('messages.tit_parceiro')) !!}
        {!! Form::text ('PARCEIRO_NOME', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'PARCEIRO_NOME'
            , 'required'=>''
            ]) !!}
    </div>

    <div class="form-group col-sm-2">
        {!! Form::label('parceiro_prioridade', trans('messages.tit_parceiro_prioridade')) !!}
        {!! Form::text ('PARCEIRO_PRIORIDADE', null,
            ['class'=>'form-control'
            , 'id'=>'PARCEIRO_PRIORIDADE'
            ]) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('nome_contato_parceiro', trans('messages.tit_parceiro_contato')) !!}
        {!! Form::text ('NOME_CONTATO_PARCEIRO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'200'
            , 'id'=>'NOME_CONTATO_PARCEIRO'
            , 'required'=>''
            ]) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('parceiro_telefone', trans('messages.tit_parceiro_telefone')) !!}
        {!! Form::text ('PARCEIRO_TELEFONE', null,
            ['class'=>'form-control'
            , 'maxlength' =>'60'
            , 'id'=>'PARCEIRO_TELEFONE'
            ]) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('parceiro_celular', trans('messages.tit_parceiro_celular')) !!}
        {!! Form::text ('PARCEIRO_CELULAR', null,
            ['class'=>'form-control'
            , 'maxlength' =>'60'
            , 'id'=>'PARCEIRO_CELULAR'
            ]) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('parceiro_mail', trans('messages.tit_parceiro_email')) !!}
        {!! Form::text ('PARCEIRO_MAIL', null,
            ['class'=>'form-control'
            , 'maxlength' =>'200'
            , 'id'=>'PARCEIRO_MAIL'
            ]) !!}
    </div>

</div>

