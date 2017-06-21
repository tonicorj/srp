<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        <h1>{!! trans('messages.t_cidades') !!}</h1>
    </div>
    <div class="content">
        {!! Form::model(null, ['class' => 'form-group', 'method' => 'GET']) !!}
        <div class="row">
            <div class="col-lg-3">
                {!! Form::label('f_nome', trans('messages.tit_cidade')) !!}
                {!! Form::text('f_nome' , session('f_nome') ,['class' => 'form-control']) !!}
            </div>
            <div class="col-lg-1">
                {!! Form::label('f_uf', trans('messages.tit_uf')) !!}
                {!! Form::text('f_uf', session('f_uf'),['class' => 'form-control']) !!}
            </div>
            <div class="col-lg-2">
                {!! Form::label('f_pais', trans('messages.tit_pais')) !!}
                {!! Form::select('f_pais' ,$paises, session('f_pais'), ['class' => 'form-control']) !!}
            </div>
            <div class="col-lg-2">
                        {!! Button::primary()
                            ->small()
                            ->withAttributes(['class'=>  trans('messages.i_pesquisar') ])
                            ->submit()
                         !!}
                    {!! Button::primary()
                        ->small()
                        ->asLinkTo(route('cidades.create'))
                        ->withAttributes(['class'=>  trans('messages.i_incluir') ]) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="row" align="center">
            {!!
                Table::withcontents($cidades)->striped()
    			->callback('Ações', function($field, $row){

				// form para exclusão
				$deleteForm = "delete-form-{$row->ID_CIDADE}";

				//
				$form = Form::open(['route' => [ 'cidades.destroy' ,'categoria' => $row->ID_CIDADE]
									, 'method' =>'DELETE'
									, 'id' => $deleteForm
									, 'style' => 'display:none'
								]).
								Form::close();
				echo $form;

				// Cria as rotas
				$route_edit   = route('cidades.edit'   , ['categoria' => $row->ID_CIDADE]);
				$anchor_edit    = Button::success()->extraSmall()->asLinkTo($route_edit)->withAttributes(['class'=>  trans('messages.i_alterar') ]);
				$anchor_delete  = Button::danger()->extraSmall()->asLinkTo('#')->withAttributes(['class'=> trans('messages.i_excluir') ])
								->addAttributes([
                                  "onclick" => "exclusao($row->ID_CIDADE, \"{$row->CATEG_DESCRICAO}\");"
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
            {{  $cidades->links() }}
            </div>
        </div>

    <script>
        function exclusao( cod, texto ){
            bootbox.confirm({
                title  : "{!! trans( 'messages.exclusao') !!} ",
                message: "{!! trans( 'messages.exc_cidade') !!} " + texto + "?",
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
