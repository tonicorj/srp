<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{!! $evento_titulo !!}</h4>
                </div>

                <div class="panel-body">
                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{$error}}</div>
                        @endforeach
                    @endif

                    {!! Form::open(
                        ['route'=>'eventosJogadores.store'
                        ,'method'=>'post'
                        , 'id'=>'form_'
                        , 'data-toggle'=>"validator"
                        , 'role'=>"form"
                        , 'class'=>'form-inline'
                        ]) !!}

                        <div class="row">
                            <div class="form-group col-lg-10">
                                {!! Form::hidden('ID_EVENTO', $evento   , ['class'=>'form-control', 'id'=>'ID_EVENTO'])!!}
                                {!! Form::label ('JOGADOR'  , trans('messages.tit_jogador')) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5">
                                {!! Form::text  ('JOGADOR'  , null, ['class'=>'form-control', 'id'=>'JOGADOR', 'required' => 'true', 'style' => 'width=100%'])  !!}
                            </div>
                            <div class="col-lg-1">
                                {!! Button::primary()->small()->withAttributes(['class'=>  trans('messages.i_incluir'), 'id'=>'bt_inclusao' ])->submit() !!}
                            </div>
                            <div class="col-lg-1">
                                {!! Button::success()->small()->withAttributes(['class'=> trans('messages.i_voltar') ])->asLinkTo(asset('ssocial/eventos'))!!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{!! trans('messages.t_eventosJogadores') !!}</h4>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <ul class="list-group" name="LISTA_JOGADORES" id="LISTA_JOGADORES">
                                @foreach ($eventos as $ev)
                                    <li class="list-group-item">
                                        {{ $ev->JOG_NOME_COMPLETO }}
                                        <div class="pull-right">
                                            {!! Button::danger()
                                                    ->ExtraSmall()
                                                    ->asLinkTo('#')
                                                    ->withAttributes(['class'=> trans('messages.i_excluir2') ])
                                                    ->addAttributes(["onclick" => 'exclusao(' . $ev->ID_EVENTO_JOGADOR . ', "' . $ev->JOG_NOME_COMPLETO . '")'])
                                                    //->submit()
                                                    //->addAttributes(["onclick" => "exclusao($ev->ID_JOGADOR)"])
                                            !!}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#bt_inclusao").click(function(event) {
            event.preventDefault();
            xurl = "{{ asset('ssocial/eventosJogadores/inclusao') }}";
            $.ajax({
                //pegando a url apartir do href do link
                url: xurl,
                type: 'GET',
                data: $("#form_").serialize(),
                //context: jQuery('#form_'),
                success: function(data){
                    cod = data;
                    if (cod != "") {
                        xform = '<form method="GET" action="{{ asset('ssocial/eventosJogadores')}}/' + cod + '" ' +
                            'accept-charset="UTF-8" ' +
                            'id="delete-form-' + cod + '" ' +
                            'style="display:none"> ' +
                            '<input name="_method" type="hidden" value="GET"> ' +
                            '<input name="_token" type="hidden" value="{{ csrf_token() }}">' +
                            '</form>';

                        link = '<li class="list-group-item">' + $("#JOGADOR").val();
                        link = link + '<span class=\"pull-right\">';
                        link = link + '<a class=\"btn btn-danger glyphicon glyphicon-trash btn-xs\" '
                        link = link + " onclick='exclusao(" + cod + ", \"" + $("#JOGADOR").val() + "\")'";
                        link = link + " href='#'></a>";
                        //', "' + $("#JOGADOR").val() + '"' + ")' href='#'></a>";
                        link = link + "</span></li>";
                        //alert(link);

                        $("#LISTA_JOGADORES").append(link);
                    }
                    $("#JOGADOR").val('');
                }
            });
        });

        function exclusao( cod, texto ){
            link = "{{asset('ssocial/eventosJogadores')}}";
            link = link + '/exclusao';
            link = link + '/' + cod;

            bootbox.dialog({
                title: "{!! trans('messages.exclusao') !!}",
                message: "{!! trans( 'messages.exc_eventoJogador') !!} " + texto + "?",
                buttons: {
                    yes: {
                        label: "{!! trans( 'messages.sim') !!}",
                        className: "btn-danger",
                        callback: function () {
                            //alert(nome_form);
                            $.ajax(link);
                            $("li").remove( ":contains('" + texto + "')" )
                        }
                    },
                    no: {
                        label: "{!! trans( 'messages.nao')  !!}",
                        className: "btn-default"
                    }
                }
            });
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
        });
</script>
@stop
