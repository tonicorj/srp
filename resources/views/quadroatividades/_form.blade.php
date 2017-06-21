{!! Form::hidden('ID_QUADRO_ATIVIDADE', null, ['class'=>'form-control', 'id'=>'ID_QUADRO_ATIVIDADE']) !!}

<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('DATA', trans('messages.tit_data')) !!}
        {!! Form::text ('DATA', null,
            ['class'=>'form-control'
            , 'maxlength' =>'10'
            , 'id'=>'DATA'
            , 'readonly'=>''
            , 'required'=>''
            ]) !!}
    </div>

    <div class="form-group col-sm-2">
        {!! Form::label('TURNO', trans('messages.tit_turno')) !!}
        {!! Form::text ('TURNO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'10'
            , 'id'=>'TURNO'
            , 'readonly'=>''
            , 'required'=>''
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('QUADRO_ATIVIDADE_HORA', trans('messages.tit_hora')) !!}
        {!! Form::text ('QUADRO_ATIVIDADE_HORA', null,
            ['class'=>'form-control'
            , 'maxlength' =>'5'
            , 'id'=>'QUADRO_ATIVIDADE_HORA'
            , 'required'=>''
            ]) !!}

    </div>
</div>

<div class="row">
    <div class="form-group col-sm-5">
        {!! Form::label ('ID_ATIVIDADE', trans('messages.tit_atividade')) !!}
        {!! Form::select('ID_ATIVIDADE', $ativ, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-5">
        {!! Form::label ('QUADRO_ATIVIDADE_LOCAL', trans('messages.tit_local')) !!}
        {!! Form::text  ('QUADRO_ATIVIDADE_LOCAL', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-5">
        {!! Form::label ('ID_ATIVIDADE2', trans('messages.tit_atividade') . ' 2') !!}
        {!! Form::select('ID_ATIVIDADE2', $ativ, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-5">
        {!! Form::label ('ID_ATIVIDADE3', trans('messages.tit_atividade') . ' 3') !!}
        {!! Form::select('ID_ATIVIDADE3', $ativ, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

</div>

