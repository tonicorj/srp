<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_cargo') !!}</h4>
        </div>
        <div class="panel-body">

            {!! Form::model($cargo,
                [ 'route'=>['cargos.update', $cargos->ID_CARGO_COMISSAO]
                , 'method'=>'put'
                , 'id'=>'form_']) !!}

            @if ($errors->any())
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="alert alert-warning list-group-item">{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            @include ('adm.cargos._form')

            <div class="form-group">
                <div class="col-lg-1">
                    {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success pull-left']) !!}
                </div>
                <div class="col-lg-1">
                    <a href="{{ asset('adm/cargos') }}" class="btn btn-sm btn-info pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop
