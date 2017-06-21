<div class="content-header">
    <h1>Cidades</h1>
</div>
<div class="content">
    @if ($errors->any())
        <ul class="alert alert-warning">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'teste.store','method'=>'post', 'id'=>'form_inclusao']) !!}
        @include ('teste._form')


        <!--
        <div class="form-group">
            {!! Form::submit('Salvar1', ['class'=>'btn btn-primary close']) !!}
            {!! Form::button('Salvar' , ['class'=>'btn btn-primary close', 'onclick'=>'inclusao();']) !!}
        </div>
        -->

    {!! Form::close() !!}

    <script>
        // rotina que chama o endereço para inclusão, passando o form como parametros
    </script>
</div>