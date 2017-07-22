@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_atendimentoSS') !!}</h4>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
            @endif

            {!! Form::open(
                ['route'=>'atendimentoSS.store'
                ,'method'=>'post'
                , 'id'=>'form_'
                , 'data-toggle'=>"validator"
                , 'role'=>"form"
                ]) !!}

                @include ('ssocial.atendimentoSS._form')

                <ul class="list-inline form-group">
                    <li>
                        {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-success pull-left']) !!}
                    </li>
                    <li></li>
                    <li>
                        <a href="{{ asset('ssocial/atendimentoSS') }}" class="btn btn-info pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                    </li>
                </ul>

            {!! Form::close() !!}
        </div>
    </div>
@stop