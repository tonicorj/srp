{!! Form::hidden('TIPO_CONTA_ID', null, ['class'=>'form-control', 'id'=>'TIPO_CONTA_ID']) !!}

<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('TIPO_CONTA_NUM', trans('messages.tit_tipoconta_num')) !!}
        {!! Form::text ('TIPO_CONTA_NUM', null,
            ['class'=>'form-control'
            , 'maxlength' =>'10'
            , 'id'=>'TIPO_CONTA_NUM'
            , 'required'=>''
            ]) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-7">
        {!! Form::label('TIPO_CONTA_DESCRICAO', trans('messages.tit_tipoconta_nome')) !!}
        {!! Form::text ('TIPO_CONTA_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'TIPO_CONTA_DESCRICAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>

