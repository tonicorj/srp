<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    @include('dm.dmacompanha.dmatend')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_dmacompanha') !!}</h4>
        </div>
        <div class="panel-body content">

            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-warning list-group-item">{{$error}}</div>
                @endforeach
            @endif

            {!! Form::model($dmacompanha,
                [ 'route'=>['dmacompanha.update', $dmacompanha->ID_ACOMPANHAMENTO_DM]
                , 'method'=>'put'
                , 'id'=>'form_']) !!}

                @include ('dm.dmacompanha._form')

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
