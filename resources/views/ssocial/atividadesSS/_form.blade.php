{!! Form::hidden('ID_ATIV_ASSIST_SOCIAL', null, ['class'=>'form-control', 'id'=>'ID_ATIV_ASSIST_SOCIAL']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-11">
        {!! Form::label('ATIV_ASSIST_SOCIAL_DESCR', trans('messages.tit_atividadeSS')) !!}
        {!! Form::text ('ATIV_ASSIST_SOCIAL_DESCR', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'ATIV_ASSIST_SOCIAL_DESCR'
            ]) !!}
    </div>
</div>

