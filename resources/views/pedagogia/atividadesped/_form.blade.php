{!! Form::hidden('ID_ATIV_PEDAGOGICA', null, ['class'=>'form-control', 'id'=>'ID_ATIV_PEDAGOGICA']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-lg-11">
        {!! Form::label('ATIV_PEDAGOGICA_DESCR', trans('messages.tit_atividadePedagogia')) !!}
        {!! Form::text ('ATIV_PEDAGOGICA_DESCR', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'ATIV_PEDAGOGICA_DESCR'
            , 'required' => 'true'
            ]) !!}
    </div>
</div>

