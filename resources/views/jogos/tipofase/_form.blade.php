{!! Form::hidden('ID_TIPOFASE', null, ['class'=>'form-control', 'id'=>'ID_TIPOFASE']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">

    <div class="form-group col-sm-7">
        {!! Form::label('TFASE_DESCRICAO', trans('messages.tit_tipofase')) !!}
        {!! Form::text ('TFASE_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'TFASE_DESCRICAO'
            ]) !!}
    </div>
</div>

