{!! Form::hidden('ID_PAIS', null, ['class'=>'form-control', 'id'=>'ID_PAIS']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('pais_nome', trans('messages.tit_pais_nome'))!!}
        {!! Form::text ('PAIS_NOME', null,
            ['class'=>'form-control'
            , 'maxlength' =>'160'
            , 'id'=>'PAIS_NOME'
            , 'required'=>''
            ]) !!}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('PAIS_SIGLA', trans('messages.tit_pais_sigla')) !!}
        {!! Form::text ('PAIS_SIGLA', null, ['class'=>'form-control input-md', 'maxlength' => '5', 'id'=>'PAIS_SIGLA']) !!}
        <div class="help-block with-errors"></div>
    </div>
</div>

