@extends('template')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{!! trans('messages.t_origemnutricao') !!}</h4>
                </div>
                <div class="panel-body">
                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger list-group-item">{{$error}}</div>
                        @endforeach
                        <br>
                    @endif

                    {!! Form::open(
                        ['route'=>'origemNutricao.store'
                        ,'method'=>'post'
                        , 'id'=>'form_'
                        , 'data-toggle'=>"validator"
                        , 'role'=>"form"
                        ]) !!}
                        @include ('nutricao.origemNutricao._form')

                        <ul class="list-inline form-group">
                            <li>
                                {!! Form::submit(trans('messages.bot_salvar')   , ['class'=>'btn btn-success pull-left']) !!}
                            </li>
                            <li></li>
                            <li>
                                <a href="{{ URL::previous() }}" class="btn btn-info pull-left">{!! trans('messages.bot_cancelar') !!}</a>
                            </li>
                        </ul>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop