@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_depmedico_atendimento') !!}</h4>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-warning" role="alert">{{$error}}</div>
                @endforeach
            @endif

            {!! Form::open(
                ['route'=>'depmedico.store'
                ,'method'=>'post'
                , 'id'=>'form_'
                , 'data-toggle'=>"validator"
                , 'role'=>"form"
                ]) !!}
                @include ('dm.depmedico._form')

                <ul class="list-inline form-group">
                    <li>
                        {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                    </li>
                    <li></li>
                    <li>
                        <a href="{{ asset('dm/depmedico') }}" class="btn btn-sm btn-info btn-flat pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                    </li>
                </ul>


                {!! Form::close() !!}
        </div>
    </div>
@stop