{!! Form::hidden('ID_ESTADOCIVIL', null, ['class'=>'form-control', 'id'=>'ID_ESTADOCIVIL']) !!}

<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('ESTADOCIVIL_DESCRICAO', 'Estado Civil') !!}
        {!! Form::text ('ESTADOCIVIL_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'50'
            , 'id'=>'ESTADOCIVIL_DESCRICAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>

