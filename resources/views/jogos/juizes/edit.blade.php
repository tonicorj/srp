<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{!! trans('messages.t_juizes') !!}</h4>
            </div>
            <div class="panel-body">

                {!! Form::model($juiz,
                    [ 'route'=>['juizes.update', $juiz->ID_JUIZ]
                    , 'method'=>'put'
                    , 'id'=>'form_']) !!}

                @if ($errors->any())
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-warning" role="alert">{{$error}}</div>
                        @endforeach
                    </ul>
                @endif

                @include ('jogos.juizes._form')

                <ul class="list-inline form-group">
                    <li>
                        {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                    </li>
                    <li></li>
                    <li>
                        <a href="{{ asset('jogos/juizes') }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                    </li>
                </ul>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
