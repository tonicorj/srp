{!! Form::hidden('ID_TIPO_CONTRATO', null, ['class'=>'form-control', 'id'=>'ID_TIPO_CONTRATO']) !!}

<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('TIPO_CONTRATO_DESCRICAO', 'Tipo de Contrato') !!}
        {!! Form::text ('TIPO_CONTRATO_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'TIPO_CONTRATO_DESCRICAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>

