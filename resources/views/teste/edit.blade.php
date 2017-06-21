<div class="content-header">
    <h1>Cidades</h1>
</div>
<div class="content">
    {!! Form::model($cidade,
        [ 'route'=>['teste.update', $cidade->ID_CIDADE]
        , 'method'=>'put'
        , 'id'=>'form_inclusao']) !!}

    <!--Código: {{ $cidade->ID_CIDADE }}-->

    @if ($errors->any())
        <ul class="alert alert-warning">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

        @include ('teste._form')

       <!--
        <div class="form-group">
            {!! Form::submit('Salvar1', ['class'=>'btn btn-primary close', 'onclick'=>'alteracao();']) !!}
            {!! Form::button('Salvar' , ['class'=>'btn btn-primary close']) !!}
        </div>
        -->

    {!! Form::close() !!}

</div>