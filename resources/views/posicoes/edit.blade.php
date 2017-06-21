<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        <h1>Posições</h1>
    </div>
    <div class="content">
        <div class="row">
            <h3>Posições</h3>
        </div>

        {!! Form::model($posicoes,
            [ 'route'=>['posicoes.update', $posicoes->POSICAO]
            , 'method'=>'put'
            , 'id'=>'form_']) !!}

        @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

            @include ('posicoes._form')

            <div class="form-group">
                <div class="col-lg-1">
                    {!! Form::submit('Salvar'   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                </div>
                <div class="col-lg-1">
                    {!! Form::button('Cancelar' , ['class'=>'btn btn-sm btn-info btn-flat pull-left', 'onclick'=>"voltar();"]) !!}
                </div>
            </div>

        {!! Form::close() !!}

        <script>
            function voltar(){
                location.href="{{ asset('posicoes') }}";
            }
            // rotina que chama o endereço para inclusão, passando o form como parametros
        </script>
    </div>
@stop

