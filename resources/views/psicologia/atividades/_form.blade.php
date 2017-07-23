{!! Form::hidden('ID_ATIV_PSICOLOGIA', null, ['class'=>'form-control', 'id'=>'ID_ATIV_PSICOLOGIA']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-10">
        {!! Form::label('ATIV_PSICOLOGIA_DESCR', trans('messages.tit_atividadePsicologia')) !!}
        {!! Form::text ('ATIV_PSICOLOGIA_DESCR', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'ATIV_PSICOLOGIA_DESCR'
            , 'required' => 'true'
            ]) !!}
    </div>
</div>

