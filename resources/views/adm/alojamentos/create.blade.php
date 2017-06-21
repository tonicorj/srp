@extends('template')

@section('content')
    <div class="content-header">
        <h1>{!! trans('messages.t_alojamento') !!}</h1>
    </div>
    <div class="content">
        @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(
            ['route'=>'alojamentos.store'
            ,'method'=>'post'
            , 'id'=>'form_'
            , 'data-toggle'=>"validator"
            , 'role'=>"form"
            ]) !!}
            @include ('adm.alojamentos._form')

            <div class="form-group">
                <div class="col-lg-1">
                    {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                </div>
                <div class="col-lg-1">
                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                </div>
            </div>

        {!! Form::close() !!}

        <script>
            function voltar(){
                location.href="{{ asset('alojamentos') }}";
            }
        </script>
    </div>
@stop