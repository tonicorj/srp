<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_atividadepedagogicas') !!}</h4>
        </div>
        <div class="panel-body">
            {!! Form::model($atividade,
                [ 'route'=>['atividadesped.update', $atividade->ID_ATIV_PEDAGOGICA]
                , 'method'=>'put'
                , 'id'=>'form_']) !!}

            @if ($errors->any())
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="alert alert-warning list-group-item">{{$error}}</li>
                    @endforeach
                </ul>
            @endif

                @include ('pedagogia.atividadesped._form')

            <ul class="list-inline form-group">
                <li>
                    {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                </li>
                <li></li>
                <li>
                    <a href="{{ asset('pedagogia/atividadesped') }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                </li>
            </ul>
            {!! Form::close() !!}
        </div>
    </div>
@stop
