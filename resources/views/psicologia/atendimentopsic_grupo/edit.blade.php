<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.tit_atendimentopsic_grupo') !!}</h4>
        </div>
        <div class="panel-body">
            {!! Form::model($atendimento,
                [ 'route'=>['atendimentopsic_grupo.update', $atendimento->ID_ATENDIMENTO_PSICOLOGIA]
                , 'method'=>'put'
                , 'id'=>'form_']) !!}

            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-warning list-group-item">{{$error}}</div>
                @endforeach
            @endif

            @include ('psicologia.atendimentopsic_grupo._form')

            <ul class="list-inline form-group">
                <li>
                    {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-success pull-left']) !!}
                </li>
                <li></li>
                <li>
                    <a href="{{ asset('psicologia/atendimentopsic_grupo') }}" class="btn btn-info pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                </li>
            </ul>

            {!! Form::close() !!}
        </div>
    </div>
@stop
