@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_ocorrencias_jog') !!}</h4>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="alert alert-warning list-group-item">{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(
                ['route'=>'ocorrencias.store'
                ,'method'=>'post'
                , 'id'=>'form_'
                , 'data-toggle'=>"validator"
                , 'role'=>"form"
                ]) !!}
                @include ('adm.ocorrencias._form')

                <ul class="list-inline form-group">
                    <li>
                        {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                    </li>
                    <li></li>
                    <li>
                        <a href="{{ asset('adm/ocorrencias') }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                    </li>
                </ul>

            {!! Form::close() !!}
        </div>
    </div>
@stop