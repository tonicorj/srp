{!! Form::hidden('ID_CONDICAO_TEMPO', null, ['class'=>'form-control', 'id'=>'ID_CONDICAO_TEMPO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('CONDICAO_TEMPO', trans('messages.tit_condicaotempo')) !!}
        {!! Form::text ('CONDICAO_TEMPO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'CONDICAO_TEMPO'
            ]) !!}
    </div>
</div>

