{!! Form::hidden('ID_CARGO_COMISSAO', null, ['class'=>'form-control', 'id'=>'ID_CARGO_COMISSAO']) !!}

<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('CARGO_COMISSAO', trans('messages.tit_cargo')) !!}
        {!! Form::text ('CARGO_COMISSAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'CARGO_COMISSAO'
            , 'required'=>''
            ]) !!}
    </div>
</div>

