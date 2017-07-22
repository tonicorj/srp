<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{!! trans('messages.t_origemservsocial') !!}</h4>
            </div>
            <div class="panel-body">
                {!! Form::model($origemservsocial,
                    [ 'route'=>['origemservsocial.update', $origemservsocial->ID_ORIGEM_SERVSOCIAL]
                    , 'method'=>'put'
                    , 'id'=>'form_']) !!}

                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{$error}}</div>
                        @endforeach
                    @endif

                    @include ('ssocial.origemservsocial._form')

                    <ul class="list-inline form-group">
                        <li>
                            {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-success pull-left']) !!}
                        </li>
                        <li></li>
                        <li>
                            <a href="{{ asset('ssocial/origemservsocial') }}" class="btn btn-info pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                        </li>
                    </ul>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
