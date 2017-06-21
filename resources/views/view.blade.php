<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SRP - </title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<style>
    @page { margin: 180px 50px; }
    #header { position: fixed; left: 0px; top   : -180px; right: 0px; height: 100px; background-color: orange; text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 100px; background-color: lightblue; }
    #footer .page:after { content: counter(page, upper-roman); }
</style>
<body>
<div id="header">
    <h1><img src="{{ url( '/imagens/logo.bmp') }}">SRP</h1>
</div>
<div id="footer">
    <p class="page">Page </p>
</div>
<div id="content">
    <table class="table table-striped">
        <tr>
            <th> ID </th>
            <th> Cirurgia </th>
        </tr>
        @foreach($model as $item)
            <tr>
                <td>{{$item->ID_ORIGEM_SERVSOCIAL}}    </td>
                <td>{{$item->ORIGEM_SERVSOCIAL_DESCRICAO}}  </td>
            </tr>
        @endforeach
    </table>
    <p style="page-break-before: always;">the second page</p>
</div>

</body>
</html>
