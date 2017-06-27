{!! Form::hidden('ID_DEPARTAMENTO', null, ['class'=>'form-control', 'id'=>'ID_DEPARTAMENTO']) !!}

<div class="row">

    <div class="form-group col-sm-11">
        {!! Form::label('departamento_descricao', 'Nome do Departamento') !!}
        {!! Form::text ('DEPARTAMENTO_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'DEPARTAMENTO_DESCRICAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>

