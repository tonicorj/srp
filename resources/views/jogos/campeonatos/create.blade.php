@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_campeonatos') !!}</h4>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-warning" role="alert">{{$error}}</div>
                @endforeach
            @endif

            {!! Form::open(
                ['route'=>'campeonatos.store'
                ,'method'=>'post'
                , 'id'=>'form_'
                , 'data-toggle'=>"validator"
                , 'role'=>"form"
                ]) !!}
                @include ('jogos.campeonatos._form')

                <div class="form-group">
                    <div class="col-lg-1">
                        {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                    </div>
                    <div class="col-lg-1">
                        <a href="{{ asset('jogos/campeonatos') }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop