{!! Form::hidden('ID_ORIGEM_PEDAGOGIA', null, ['class'=>'form-control', 'id'=>'ID_ORIGEM_PEDAGOGIA']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-sm-10">
        {!! Form::label('ORIGEM_PEDAGOGIA_DESCRICAO', trans('messages.tit_origempedagogia')) !!}
        {!! Form::text ('ORIGEM_PEDAGOGIA_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'ORIGEM_PEDAGOGIA_DESCRICAO'
            , 'required'=>'true'
            ]) !!}
    </div>
</div>

