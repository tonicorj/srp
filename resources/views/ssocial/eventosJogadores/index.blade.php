<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        <h1>{!! trans('messages.t_eventosJogadores') !!}</h1>
    </div>
    <div class="content">
        <div class="row">
            {!! Form::open(
                ['route'=>'eventosJogadores.store'
                ,'method'=>'post'
                , 'id'=>'form_'
                , 'data-toggle'=>"validator"
                , 'role'=>"form"
                , 'class'=>'form-inline'
                ]) !!}
            <div class="col-lg-4">
                {!! Form::label ('JOGADOR'  , trans('messages.tit_jogador')) !!}
                {!! Form::hidden('ID_EVENTO', $evento   , ['class'=>'form-control', 'id'=>'ID_EVENTO'])!!}
                {!! Form::text  ('JOGADOR'  , null, ['class'=>'form-control', 'id'=>'JOGADOR', 'required' => 'true'])  !!}
                {!! Button::primary()
                    ->small()
                    ->withAttributes(['class'=>  trans('messages.i_incluir') ])
                    ->submit()
                !!}
            </div>
            {!! Form::close() !!}
        </div>

        <br>
        <div class="row">
            <div class="col-lg-6">
                <span>Jogadores Selecionados</span>
                <ul class="list-group" name="LISTA_JOGADORES" id="LISTA_JOGADORES">
                    @foreach ($eventos as $ev)
                    <li class="list-group-item ">
                        {{ $ev->JOG_NOME_COMPLETO }}
                        <span class="pull-right">
                            {!! Button::danger()
                                    ->extraSmall()
                                    ->asLinkTo('#')
                                    ->withAttributes(['class'=> trans('messages.i_excluir') ])
                                    ->addAttributes(["onclick" => "exclusao($ev->ID_EVENTO_JOGADOR)"])
                                    ->submit()
                                    // + ', "' + $ev->JOG_NOME_COMPLETO + '"' + ")"])
                                    //->addAttributes(["onclick" => "exclusao($ev->ID_JOGADOR)"])
                            !!}
                        </span>
                    </li>
                        {!!// form para exclusão
                         Form::open(['route' => [ 'eventosJogadores.destroy','id' => $ev->ID_EVENTO_JOGADOR ]
                                            , 'method' =>'DELETE'
                                            , 'id' => ( "delete-form-" . $ev->ID_EVENTO_JOGADOR )
                                            , 'style' => 'display:none'
                         ]).Form::close()
                        !!}
                    @endforeach
                </ul>
            </div>
        </div>
        {!!
            Button::success()
                ->withAttributes(['class'=> trans('messages.i_voltar') ])
                ->asLinkTo(asset('ssocial'));
         !!}

    </div>

    <script>
        function inclusao() {
            xurl = "{{ route('eventosJogadores.store') }}";
            //alert(xurl);
            alert($("#form_").serialize());
            cod =  $.ajar({
                url : xurl,
                data : $("#form_").serialize(),
                type : "POST",
                dataType: "html",
                error : function(a,b,c){
                    alert('Erro: '+a[status]+' '+c); },
                success: function(data) {
                    alert(data);
                }
            });
                //            }, {ID_EVENTO: $("#ID_EVENTO").val(), JOGADOR: $("#JOGADOR").val()});
            alert(cod);

            link = '<li class="list-group-item ">' + $("#JOGADOR").val();
            link = link + "<span class=\"pull-right\">";
            link = link + "<a class='btn btn-danger glyphicon glyphicon-trash btn-xs' onclick='exclusao(" + cod + ")";
            link = link + " href='#'></a>";
                //', "' + $("#JOGADOR").val() + '"' + ")' href='#'></a>";
            link = link + "</span></li>";
            alert(link);
            $("#LISTA_JOGADORES").append(link);
        }
        function exclusao( cod, texto ){
            var nome_form;
            nome_form = "delete-form-" + cod;
            event.preventDefault();
            document.getElementById(nome_form).submit();

            /*
            link = "{{asset('eventosJogadores')}}";
            link = link + '/destroy';
            link = link + '/' + cod;
            alert(link);
            $.ajax(link);
            $("#LISTA_JOGADORES").delete(texto);

            alert(cod);
            bootbox.confirm({
                title  : "{!! trans( 'messages.exclusao') !!} ",
                message: "{!! trans( 'messages.exc_eventoJogador') !!} " + texto + "?",
                buttons:{
                    confirm: {
                        label:"{!! trans( 'messages.sim') !!}",
                        className: "btn-danger",
                    },
                    cancel: {
                        label:"{!! trans( 'messages.nao')  !!}",
                        className: "btn-default"
                    }
                },
                callback: function (result) {
                    //alert(cod);
                    link = "{{asset('eventosJogadores.destroy')}}";
                    link = link + '/' + cod;
                    $.ajax(link);
                    $("#LISTA_JOGADORES").delete(texto);
                }
            });
            */
        }

        $(document).ready(function() {
            {!! FormAutocomplete::selector('#JOGADOR')
                    ->source(function(){
                    return DB::table('V_ELENCO')
                        ->where('ID_CATEGORIA', '<>', '1')
                        ->where('ELENCO_STATUS', '=', 'S')
                        ->pluck('JOG_NOME_COMPLETO');
                    }
                )
            !!}


  		    /*
  		    $('#form_').submit(function(){
                var dados = $( this ).serialize();
                var xurl = "{{ route('eventosJogadores.store') }}";

                $.ajax({
                    type: "POST",
                    url: xurl,
                    data: dados,
                    success: function( data )
                    {
                        alert( data );
                        link = '<li class="list-group-item ">' + $("#JOGADOR").val();
                        link = link + "<span class=\"pull-right\">";
                        link = link + "<a class='btn btn-danger glyphicon glyphicon-trash btn-xs' onclick='exclusao(" + cod + ")";
                        link = link + " href='#'></a>";
                        //', "' + $("#JOGADOR").val() + '"' + ")' href='#'></a>";
                        link = link + "</span></li>";
                        alert(link);
                        $("#LISTA_JOGADORES").append(link);
                    },
                    error : function(a,b,c){
                        alert('Erro: '+a[status]+' '+c); },
                });

                //return false;
            });
            */
        });
</script>
@stop
