<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{!! trans('messages.t_cirurgias') !!}</h4>
            </div>
            <div class="panel-body">
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning list-group-item">{{$error}}</div>
                    @endforeach
                @endif

                {!! Form::model($cirurgia,
                    [ 'route'=>['cirurgias.update', $cirurgia->ID_CIRURGIA]
                    , 'method'=>'put'
                    , 'id'=>'form_']) !!}

                    @include ('dm.cirurgias._form')

                    <ul class="list-inline form-group">
                        <li>
                            {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                        </li>
                        <li></li>
                        <li>
                            <a href="{{ asset('dm/cirurgias') }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                        </li>
                    </ul>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
