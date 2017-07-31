<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{!! trans('messages.t_controlesuplemento') !!}</h4>
                </div>
                <div class="panel-body">
                    {!! Form::model($controle,
                        [ 'route'=>['controlesuplemento.update', $controle->ID_CONTROLE_SUPLEMENTO]
                        , 'method'=>'put'
                        , 'id'=>'form_']) !!}

                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-warning list-group-item">{{$error}}</div>
                        @endforeach
                        <br>
                    @endif

                        @include ('nutricao.controlesuplemento._form')

                        <div class="form-group">
                            <div class="col-lg-1">
                                {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-success pull-left']) !!}
                            </div>
                            <div class="col-lg-1">
                                <a href="{{asset('nutricao/controlesuplemento') }}" class="btn btn-info pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

