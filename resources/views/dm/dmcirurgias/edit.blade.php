<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        @include('dm.dmacompanha.dmatend')
        <h1>{!! trans('messages.t_cirurgias') !!}</h1>
    </div>

    <div class="content">
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-warning list-group-item">{{$error}}</div>
            @endforeach
        @endif

        {!! Form::model($dmcirurgia,
             [ 'route'=>['dmcirurgias.update', $dmcirurgia->ID_DM_CIRURGIA]
             , 'method'=>'put'
             , 'id'=>'form_']) !!}


            @include ('dm.dmcirurgias._form')

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
@stop
