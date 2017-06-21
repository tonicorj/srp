<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        <h1>{!! trans('messages.t_jogobservacao') !!}</h1>
    </div>
    <div class="content">
        {!! Form::model($jogadores,
            [ 'route'=>['jogadoresObservacao.update', $jogadores->ID_JOGADOR]
            , 'method'=>'put'
            , 'files' => true
            , 'id'=>'form_']) !!}

        @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

            @include ('jogadoresObservacao._form')

            <div class="form-group">
                <div class="col-lg-1">
                    {!! Form::submit({!! trans('messages.bot_salvar') !!}   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                </div>
                <div class="col-lg-1">
                    {!! Form::button({!! trans('messages.bot_cancelar') !!} , ['class'=>'btn btn-sm btn-info btn-flat pull-left', 'onclick'=>"voltar();"]) !!}
                </div>
            </div>

        {!! Form::close() !!}

        <script>
            function voltar(){
                location.href="{{ asset('jogadoresObservacao') }}";
            }
            // rotina que chama o endereço para inclusão, passando o form como parametros
        </script>
    </div>
@stop
