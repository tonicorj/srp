@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_tipoconta') !!}</h4>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(
                ['route'=>'tipocontas.store'
                ,'method'=>'post'
                , 'id'=>'form_'
                , 'data-toggle'=>"validator"
                , 'role'=>"form"
                ]) !!}
            @include ('financeiro.tipocontas._form')

            <ul class="list-inline form-group">
                <li>
                    {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                </li>
                <li></li>
                <li>
                    <a href="{{ asset('financeiro/tipocontas') }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                </li>
            </ul>
            {!! Form::close() !!}
        </div>
    </div>
@stop