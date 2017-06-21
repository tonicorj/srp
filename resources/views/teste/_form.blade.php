{!! Form::hidden('ID_CIDADE', null, ['class'=>'form-control', 'id'=>'ID_CIDADE']) !!}

<div class="row">
    <div class="form-group col-sm-7">
        {!! Form::label('cidade_nome', 'Nome do Cidade') !!}
        {!! Form::text('CIDADE_NOME', null, ['class'=>'form-control', 'maxlength' =>'30', 'id'=>'CIDADE_NOME']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('uf', 'UF') !!}
        {!! Form::text('UF', null, ['class'=>'form-control input-md', 'maxlength' => '5', 'id'=>'UF']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-7">
        {!! Form::label ('id_pais', 'País') !!}
        {!! Form::select('id_pais', $paises, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

