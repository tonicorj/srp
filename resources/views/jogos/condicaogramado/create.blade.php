@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_condicaogramado') !!}</h4>
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
                ['route'=>'condicaogramado.store'
                ,'method'=>'post'
                , 'id'=>'form_'
                , 'data-toggle'=>"validator"
                , 'role'=>"form"
                ]) !!}
                @include ('jogos.condicaogramado._form')

                <div class="form-group">
                    <div class="col-lg-1">
                        {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                    </div>
                    <div class="col-lg-1">
                        <a href="{{ asset('jogos/condicaogramado') }}" class="btn btn-sm btn-info pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop