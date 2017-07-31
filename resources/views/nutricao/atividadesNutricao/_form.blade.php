{!! Form::hidden('ID_ATIV_NUTRICAO', null, ['class'=>'form-control', 'id'=>'ID_ATIV_NUTRICAO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-11">
        {!! Form::label('ATIV_NUTRICAO_DESCR', trans('messages.tit_atividadeNutricao')) !!}
        {!! Form::text ('ATIV_NUTRICAO_DESCR', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'ATIV_NUTRICAO_DESCR'
            , 'required' => 'true'
            ]) !!}
    </div>
</div>

