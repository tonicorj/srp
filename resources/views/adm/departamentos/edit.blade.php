<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{!! trans('messages.t_departamento') !!}</h4>
            </div>
            <div class="panel-body">

                {!! Form::model($departamentos,
                    [ 'route'=>['departamentos.update', $departamentos->ID_DEPARTAMENTO]
                    , 'method'=>'put'
                    , 'id'=>'form_']) !!}

                @if ($errors->any())
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="alert alert-warning list-group-item">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                @include ('adm.departamentos._form')

                <ul class="list-inline form-group">
                    <li>
                        {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                    </li>
                    <li></li>
                    <li>
                        <a href="{{ asset('adm/departamentos') }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                    </li>
                </ul>
                
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

