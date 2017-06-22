{!! Form::hidden('ID_ESCOPO', null, ['class'=>'form-control', 'id'=>'ID_ESCOPO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('ESCOPO_DESCRICAO', trans('messages.tit_escopo')) !!}
        {!! Form::text ('ESCOPO_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'ESCOPO_DESCRICAO'
            ]) !!}
    </div>
</div>

