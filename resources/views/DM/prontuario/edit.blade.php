<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    @include('DM.dmacompanha.dmatend')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_prontuario') !!}</h4>
        </div>
        <div class="panel-body content">
            {!! Form::model($prontuario,
                [ 'route'=>['prontuario.update', $prontuario->ID_PRONTUARIO]
                , 'method'=>'put'
                , 'id'=>'form_']) !!}

            <!--Código: {{ $prontuario->ID_PRONTUARIO }}-->

            @if ($errors->any())
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="alert alert-warning list-group-item">{{$error}}</li>
                    @endforeach
                </ul>
            @endif

                @include ('DM.prontuario._form')

                <div class="form-group">
                    <div class="col-lg-1">
                        {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                    </div>
                    <div class="col-lg-1">
                        <a href="{{ URL::previous() }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>

@stop
