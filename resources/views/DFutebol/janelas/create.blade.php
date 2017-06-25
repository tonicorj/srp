@extends('template')

@section('content')
    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{!! trans('messages.t_janelas') !!}</h4>
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
                    ['route'=>'janelas.store'
                    ,'method'=>'post'
                    , 'id'=>'form_'
                    , 'data-toggle'=>"validator"
                    , 'role'=>"form"
                    ]) !!}
                @include ('DFutebol.janelas._form')

                <ul class="list-inline form-group">
                    <li>
                        {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                    </li>
                    <li></li>
                    <li>
                        <a href="{{ asset('DFutebol/janelas') }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                    </li>
                </ul>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop