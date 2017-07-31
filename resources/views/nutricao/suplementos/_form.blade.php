{!! Form::hidden('ID_SUPLEMENTO', null, ['class'=>'form-control', 'id'=>'ID_SUPLEMENTO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-11">
        {!! Form::label('SUPLEMENTO_DESCRICAO', trans('messages.tit_suplementos')) !!}
        {!! Form::text ('SUPLEMENTO_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'SUPLEMENTO_DESCRICAO'
            , 'required' => 'true'
            ]) !!}
    </div>
</div>

