{!! Form::hidden('ID_CRITERIOS', null, ['class'=>'form-control', 'id'=>'ID_CRITERIOS']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('CRIT_DESCRICAO', trans('messages.tit_criterio')) !!}
        {!! Form::text ('CRIT_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'20'
            , 'id'=>'CRIT_DESCRICAO'
            ]) !!}
    </div>
</div>

