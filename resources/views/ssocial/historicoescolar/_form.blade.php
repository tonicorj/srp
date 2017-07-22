{!! Form::hidden('ID_HIST_ESCOLAR', null, ['class'=>'form-control', 'id'=>'ID_HIST_ESCOLAR']) !!}

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('ID_JOGADOR' , trans('messages.tit_jogador')) !!}
        {!! Form::select('ID_JOGADOR', $jogadores, null, ['class'=>'form-control input-md', 'required' => 'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('ESCOLA_NOME', trans('messages.tit_escolanome')) !!}
        {!! Form::text ('ESCOLA_NOME', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'ESCOLA_NOME'
            , 'required' => 'true'
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-2">
        {!! Form::label('ESCOLA_ANO', trans('messages.tit_escolaano')) !!}
        {!! Form::text ('ESCOLA_ANO', null,
            ['class'=>'form-control'
            , 'maxlength' =>'4'
            , 'id'=>'ESCOLA_ANO'
            , 'required' => 'true'
            ]) !!}
    </div>

    <div class="form-group col-lg-4">
        {!! Form::label('ESCOLA_SERIE', trans('messages.tit_escolaserie')) !!}
        {!! Form::text ('ESCOLA_SERIE', null,
            ['class'=>'form-control'
            , 'maxlength' =>'10'
            , 'id'=>'ESCOLA_SERIE'
            , 'required' => 'true'
            ]) !!}
    </div>

    <div class="form-group col-lg-4">
        {!! Form::label('ESCOLA_TURMA', trans('messages.tit_escolaturma')) !!}
        {!! Form::text ('ESCOLA_TURMA', null,
            ['class'=>'form-control'
            , 'maxlength' =>'10'
            , 'id'=>'ESCOLA_TURMA'
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                {!! trans('messages.tit_escolaboletins') !!}
            </div>
            <div class="panel-body">
                <div class="form-group col-lg-3">
                    {{ Form::checkbox('FLAG_1BIMESTRE') }}
                    {!! Form::label('FLAG_1BIMESTRE' , trans('messages.tit_escola1bim')) !!}
                </div><!-- /.col-lg-6 -->
                <div class="form-group col-lg-3">
                    {{ Form::checkbox('FLAG_2BIMESTRE') }}
                    {!! Form::label('FLAG_2BIMESTRE' , trans('messages.tit_escola2bim')) !!}
                </div><!-- /.col-lg-6 -->
                <div class="form-group col-lg-3">
                    {{ Form::checkbox('FLAG_3BIMESTRE') }}
                    {!! Form::label('FLAG_3BIMESTRE' , trans('messages.tit_escola3bim')) !!}
                </div><!-- /.col-lg-6 -->
                <div class="form-group col-lg-3">
                    {{ Form::checkbox('FLAG_4BIMESTRE') }}
                    {!! Form::label('FLAG_4BIMESTRE' , trans('messages.tit_escola4bim')) !!}
                </div><!-- /.col-lg-6 -->
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                {!! trans('messages.tit_escoladocumentos') !!}
            </div>
            <div class="panel-body">
                <div class="form-group col-lg-6">
                    {{ Form::checkbox('FLAG_TRANSFERENCIA') }}
                    {!! Form::label('FLAG_TRANSFERENCIA' , trans('messages.tit_escolatransf')) !!}
                </div><!-- /.col-lg-6 -->
                <div class="form-group col-lg-6">
                    {{ Form::checkbox('FLAG_HISTORICO') }}
                    {!! Form::label('FLAG_HISTORICO' , trans('messages.tit_escolahistorico')) !!}
                </div><!-- /.col-lg-6 -->
            </div>
        </div>
    </div>
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                {!! trans('messages.tit_escolaresultado') !!}
            </div>
            <div class="panel-body">
                <div class="form-group col-lg-4">
                    {{ Form::radio('FLAG_APROVADO', 'A') }}
                    {!! Form::label('FLAG_APROVADO' , trans('messages.tit_escolaaprovado')) !!}
                </div><!-- /.col-lg-6 -->
                <div class="form-group col-lg-4">
                    {{ Form::radio('FLAG_APROVADO', 'R') }}
                    {!! Form::label('FLAG_REPROVADO' , trans('messages.tit_escolareprovado')) !!}
                </div><!-- /.col-lg-6 -->
                <div class="form-group col-lg-4">
                    {{ Form::checkbox('FLAG_RECLASSIFICADO') }}
                    {!! Form::label('FLAG_RECLASSIFICADO' , trans('messages.tit_escolareclassificado')) !!}
                </div><!-- /.col-lg-6 -->
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('HIST_OBSERVACAO' , trans('messages.tit_obsatendimento')) !!}
        {!! Form::textarea('HIST_OBSERVACAO', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>




