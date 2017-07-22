@extends('template')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{!! trans('messages.t_historicoescolar') !!}</h4>
                </div>
                <div class="panel-body">
                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{$error}}</div>
                        @endforeach
                    @endif

                    {!! Form::open(
                        ['route'=>'historicoescolar.store'
                        ,'method'=>'post'
                        , 'id'=>'form_'
                        , 'data-toggle'=>"validator"
                        , 'role'=>"form"
                        ]) !!}
                        @include ('ssocial.historicoescolar._form')

                        <ul class="list-inline form-group">
                            <li>
                                {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-success pull-left']) !!}
                            </li>
                            <li></li>
                            <li>
                                <a href="{{ asset('ssocial/historicoescolar') }}" class="btn btn-info pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                            </li>
                        </ul>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop