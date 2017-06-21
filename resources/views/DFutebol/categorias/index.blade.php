<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        <h1>{!! trans('messages.t_categoria') !!}</h1>
    </div>
    <div class="content">
        <div class="row">
            {!! Form::model(compact($pesquisa), ['class' => 'form-inline', 'method' => 'GET']) !!}
                <div class="col-lg-5">
                        {!! Form::text('pesquisa', $pesquisa,['class' => 'form-control']) !!}
                        {!! Button::primary()
                            ->small()
                            ->asLinkTo(asset('DFutebol/categorias'))
                            ->withAttributes(['class'=>  trans('messages.i_pesquisar') ]) !!}
                    {!! Button::primary()
                        ->small()
                        ->asLinkTo(route('categorias.create'))
                        ->withAttributes(['class'=>  trans('messages.i_incluir') ]) !!}
                </div>
            {!! Form::close() !!}
        </div>
        <div class="row" align="center">
            {!!
                Table::withcontents($categorias)->striped()
    			->callback('Ações', function($field, $row){

				// form para exclusão
				$deleteForm = "delete-form-{$row->ID_CATEGORIA}";

				//
				$form = Form::open(['route' => [ 'categorias.destroy' ,'categoria' => $row->ID_CATEGORIA]
									, 'method' =>'DELETE'
									, 'id' => $deleteForm
									, 'style' => 'display:none'
								]).
								Form::close();
				echo $form;

				// Cria as rotas
				$route_edit   = route('categorias.edit'   , ['categoria' => $row->ID_CATEGORIA]);
				$anchor_edit    = Button::success()->extraSmall()->asLinkTo($route_edit)->withAttributes(['class'=>  trans('messages.i_alterar') ]);
				$anchor_delete  = Button::danger()->extraSmall()->asLinkTo('#')->withAttributes(['class'=> trans('messages.i_excluir') ])
								->addAttributes([
                                  "onclick" => "exclusao($row->ID_CATEGORIA, \"{$row->CATEG_DESCRICAO}\");"
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
            {{  $categorias->links() }}
            </div>
        </div>

    <script>
        function exclusao( cod, texto ){
            bootbox.confirm({
                title  : "{!! trans( 'messages.exclusao') !!} ",
                message: "{!! trans( 'messages.exc_categoria') !!} " + texto + "?",
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
