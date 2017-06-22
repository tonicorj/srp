{!! Form::hidden('CONTA_ID', null, ['class'=>'form-control', 'id'=>'CONTA_ID']) !!}

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('TIPO_CONTA_ID' , trans('messages.tit_tipoconta')) !!}
        {!! Form::select('TIPO_CONTA_ID', $tipoconta, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('CONTA_NUMERO', trans('messages.tit_conta_num')) !!}
        {!! Form::text ('CONTA_NUMERO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'10'
            , 'id'=>'CONTA_NUMERO'
            , 'required'=>''
            ]) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-7">
        {!! Form::label('CONTA_NOME', trans('messages.tit_conta_nome')) !!}
        {!! Form::text ('CONTA_NOME', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'CONTA_NOME'
            , 'required'=>''
            ]) !!}
    </div>
</div>

