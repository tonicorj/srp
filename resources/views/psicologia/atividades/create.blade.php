@extends('template')

@section('content')
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{!! trans('messages.t_atividadepsicologia') !!}</h4>
            </div>
            <div class="panel-body">
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger list-group-item">{{$error}}</div>
                    @endforeach
                @endif

                {!! Form::open(
                    ['route'=>'atividades.store'
                    ,'method'=>'post'
                    , 'id'=>'form_'
                    , 'data-toggle'=>"validator"
                    , 'role'=>"form"
                    ]) !!}
                    @include ('psicologia.atividades._form')

                    <ul class="list-inline form-group">
                        <li>
                            {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-success pull-left']) !!}
                        </li>
                        <li></li>
                        <li>
                            <a href="{{ asset('psicologia/atividades') }}" class="btn btn-info pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                        </li>
                    </ul>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop