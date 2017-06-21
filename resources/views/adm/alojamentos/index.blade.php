<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        <h1>{!! trans('messages.t_alojamento') !!}</h1>
    </div>
    <div class="row">
        <div class="col-lg-3">
            {!! Button::primary()->small()->asLinkTo(route('alojamentos.create'))->withAttributes(['class'=>  trans('messages.i_incluir') ]) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            {!!
                //dd($alojamentos);
                Table::withcontents($alojamentos)->striped()
                ->withAttributes(['align' => 'center'])
                ->callback('Ações', function($field, $row){
                // form para exclusão
                $deleteForm = "delete-form-{$row->ID_ALOJAMENTO}";

                $form = Form::open(['route' => [ 'alojamentos.destroy' ,'alojamento' => $row->ID_ALOJAMENTO]
                                    , 'method' =>'DELETE'
                                    , 'id' => $deleteForm
                                    , 'style' => 'display:none'
                                ]).
                                Form::close();
                echo $form;

                // Cria as rotas
                $route_edit   = route('alojamentos.edit'   , ['alojamento' => $row->ID_ALOJAMENTO]);
                $anchor_edit    = Button::success()->extraSmall()->asLinkTo($route_edit)->withAttributes(['class'=>  trans('messages.i_alterar') ]);
                $anchor_delete  = Button::danger()->extraSmall()->asLinkTo('#')->withAttributes(['class'=> trans('messages.i_excluir') ])
                                ->addAttributes([
                                      "onclick" => "exclusao($row->ID_ALOJAMENTO, \"{$row->ALOJAMENTO_NOME}\");"
                                ]);
                return 	"<ul class=\"list-inline\">" .
                            "<li>" . $anchor_edit . "</li>" .
                            "<li>" . $anchor_delete . "</li>" .
                        "</ul>";
            })
            !!}
        </div>
        <div class="row" id="paginacao" valign="center" >
            <div class="col-lg-12 col-sm-5">
                {{  $alojamentos->links() }}
            </div>
        </div>
    </div>

    <script>
        function exclusao( cod, texto ){
            bootbox.confirm({
                title  : "{!! trans( 'messages.exclusao') !!} ",
                message: "{!! trans( 'messages.exc_alojamento') !!} " + texto + "?",
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
                    var nome_form;
                    nome_form = "delete-form-" + cod;

                    if (result == true) {
                        event.preventDefault();
                        document.getElementById(nome_form).submit();
                    };
                }
            });
        }
    </script>

@stop
