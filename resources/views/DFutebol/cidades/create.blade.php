@extends('template')

@section('content')
    <div class="content-header">
        <h1>{!! trans('messages.t_cidades') !!}</h1>
    </div>
    <div class="content">
        @if ($errors->any())
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="alert alert-warning list-group-item">{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(
            ['route'=>'cidades.store'
            ,'method'=>'post'
            , 'id'=>'form_'
            , 'data-toggle'=>"validator"
            , 'role'=>"form"
            ]) !!}
            @include ('DFutebol.cidades._form')

            <div class="form-group">
                <div class="col-lg-1">
                    {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                </div>
                <div class="col-lg-1">
                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                </div>
            </div>

        {!! Form::close() !!}
    </div>
@stop