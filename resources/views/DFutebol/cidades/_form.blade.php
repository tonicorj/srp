{!! Form::hidden('ID_CIDADE', null, ['class'=>'form-control', 'id'=>'ID_CIDADE']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">
    <div class="form-group col-sm-7">
        {!! Form::label('CIDADE_NOME', trans('messages.tit_cidade')) !!}
        {!! Form::text ('CIDADE_NOME', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'CIDADE_NOME'
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('UF', trans('messages.tit_uf')) !!}
        {!! Form::text ('UF', null,
            ['class'=>'form-control'
            , 'id'=>'UF'
            ]) !!}
    </div>
    <div class="col-sm-1"></div>
    <div class="form-group col-sm-2">
        {!! Form::label('ID_PAIS', trans('messages.tit_pais')) !!}
        {!! Form::select('ID_PAIS', $paises, null, ['class'=>'form-control input-md']) !!}    </div>
</div>

