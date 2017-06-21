@extends('template')

@section('content')
    <div class="content-header">
        <h1>Jogadores</h1>
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
            ['route'=>'jogadores.store'
            ,'method'=>'post'
            , 'id'=>'form_'
            , 'data-toggle'=>"validator"
            , 'role'=>"form"
            , 'files' => true
            ]) !!}
            @include ('jogadores._form')

            <div class="form-group">
                <div class="col-lg-1">
                    {!! Form::submit('Salvar'   , ['class'=>'btn btn-sm btn-success btn-flat pull-left']) !!}
                </div>
                <div class="col-lg-1">
                    {!! Form::button('Cancelar' , ['class'=>'btn btn-sm btn-info btn-flat pull-left', 'onclick'=>"voltar();"]) !!}
                </div>
            </div>

        {!! Form::close() !!}

        <script>
            function voltar(){
                location.href="{{ asset('jogadores') }}";
            }
            // rotina que chama o endereço para inclusão, passando o form como parametros
        </script>
    </div>
@stop