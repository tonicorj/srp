{!! Form::hidden('ID_CATEGORIA', null, ['class'=>'form-control', 'id'=>'ID_CATEGORIA']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">
    <div class="form-group col-sm-7">
        {!! Form::label('CATEG_DESCRICAO', trans('messages.tit_categoria')) !!}
        {!! Form::text ('CATEG_DESCRICAO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'CATEG_DESCRICAO'
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('CATEG_IDADE_INI', trans('messages.tit_categ_idade_ini')) !!}
        {!! Form::text ('CATEG_IDADE_INI', null,
            ['class'=>'form-control'
            , 'id'=>'CATEG_IDADE_INI'
            ]) !!}
    </div>
    <div class="col-sm-1"></div>
    <div class="form-group col-sm-2">
        {!! Form::label('CATEG_IDADE_FIN', trans('messages.tit_categ_idade_fin')) !!}
        {!! Form::text ('CATEG_IDADE_FIN', null,
            ['class'=>'form-control'
            , 'id'=>'CATEG_IDADE_FIN'
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('CATEG_TEMPO_JOGO', trans('messages.tit_categ_tempo_jogo')) !!}
        {!! Form::text ('CATEG_TEMPO_JOGO', null,
            ['class'=>'form-control'
            , 'id'=>'CATEG_TEMPO_JOGO'
            ]) !!}
    </div>
</div>

