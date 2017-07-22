<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_atendimentoSS_func') !!}</h4>
        </div>
        <div class="panel-body">
            {!! Form::model($atendimento,
                [ 'route'=>['atendimentoSS_func.update', $atendimento->ID_ATEND_ASSIST_SOCIAL]
                , 'method'=>'put'
                , 'id'=>'form_']) !!}

            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
            @endif

            @include ('ssocial.atendimentoSS_func._form')

            <ul class="list-inline form-group">
                <li>
                    {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-success pull-left']) !!}
                </li>
                <li></li>
                <li>
                    <a href="{{ asset('ssocial/atendimentoSS_func') }}" class="btn btn-info pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                </li>
            </ul>

            {!! Form::close() !!}
        </div>
    </div>
@stop
