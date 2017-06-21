<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_motivo_ausencia_escolar') !!}</h4>
        </div>
        <div class="panel-body">
            {!! Form::model($motivo,
                [ 'route'=>['motivoAusenciaEscolar.update', $motivo->ID_MOTIVO_AUSENCIA_ESCOLAR]
                , 'method'=>'put'
                , 'id'=>'form_']) !!}

            <!--Código: {{ $motivo->ID_MOTIVO_AUSENCIA_ESCOLAR }}-->

            @if ($errors->any())
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="alert alert-warning list-group-item">{{$error}}</li>
                    @endforeach
                </ul>
            @endif

                @include ('SSocial.motivoAusenciaEscolar._form')

                <ul class="list-inline form-group">
                    <li>
                        {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                    </li>
                    <li></li>
                    <li>
                        <a href="{{ asset('SSocial/atividadesSS') }}" class="btn btn-sm btn-info pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                    </li>
                </ul>
            {!! Form::close() !!}
        </div>
    </div>
@stop
