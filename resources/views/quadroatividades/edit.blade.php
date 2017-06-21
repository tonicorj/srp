<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        <h1>{!! trans('messages.t_quadroatividades') !!}</h1>
    </div>
    <div class="content">
        {!! Form::model($qatividade,
            [ 'route'=>['quadroatividades.update', $qatividade->ID_QUADRO_ATIVIDADE]
            , 'method'=>'put'
            , 'id'=>'form_']) !!}

        <!--Código: {{ $qatividade->ID_QUADRO_ATIVIDADE}}-->

        @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

            @include ('quadroatividades._form')

            <div class="form-group">
                <div class="col-lg-1">
                    {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                </div>
                <div class="col-lg-1">
                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                </div>
            </div>

        {!! Form::close() !!}

        <script>
            function voltar(){
                //location.href="{{ asset('quadroatividades') . '/' . $qatividade->quadro_atividade_dada}}";
            }
            // rotina que chama o endereço para inclusão, passando o form como parametros
        </script>
    </div>
@stop
