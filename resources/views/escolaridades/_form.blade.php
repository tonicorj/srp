{!! Form::hidden('ID_ESCOLARIDADE', null, ['class'=>'form-control', 'id'=>'ID_ESCOLARIDADE']) !!}

<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('escolaridade_descricao', 'Escolaridade') !!}
        {!! Form::text ('ESCOLARIDADE_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'50'
            , 'id'=>'ESCOLARIDADE_DESCRICAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>

