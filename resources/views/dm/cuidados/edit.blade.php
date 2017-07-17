<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_cuidados') !!}</h4>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-warning" role="alert">{{$error}}</div>
                @endforeach
            @endif

            {!! Form::model($cuidado,
                [ 'route'=>['cuidados.update', $cuidado->ID_JOGADOR]
                , 'method'=>'put'
                , 'id'=>'form_']) !!}
                @include ('dm.cuidados._form')

                <ul class="list-inline form-group">
                    <li>
                        {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                    </li>
                    <li></li>
                    <li>
                        <a href="{{ asset('dm/cuidados') }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                    </li>
                </ul>

            {!! Form::close() !!}
        </div>
    </div>
@stop
