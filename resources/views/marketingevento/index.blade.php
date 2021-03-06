<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        <h1>{!! trans('messages.t_marketingevento') !!}</h1>
    </div>
    <div class="content">
        <div class="row">
            <button id="inc"    hidden="true" class="bootstrap-modal-form-open">{!! trans('messages.inclusao') !!}</button>
            <button id="alt"    hidden="true" class="bootstrap-modal-form-open">{!! trans('messages.alteracao') !!}</button>
            <button id="exc"    hidden="true" class="bootstrap-modal-form-open">{!! trans('messages.exclusao') !!}</button>
        </div>

        <div class="row" >
            <table class="display" id="table2">
                <thead>
                <tr>
                    <th>{!! trans('messages.tit_marketingevento') !!}</th>
                    <th>{!! trans('messages.tit_marketingevento_data') !!}</th>
                    <th>{!! trans('messages.tit_tipoacao') !!}</th>
                </tr>
                </thead>
            </table>
        </div>

        <div id="saida">
        </div>

    </div>
    <script>
        var oTable;
        $(document).ready(function() {
            $('#table2').css('width', '90%');
            oTable = $('#table2').DataTable({
                "searching": true,
                "ordering": false,
                "paging": true,
                "ajax": "{{ asset( 'marketingevento/_json' ) }}",
                bAutoWidth:true,
                columns: [
                    {"data": "MARKETING_EVENTO_DESCRICAO"},
                    {"data": "MARKETING_EVENTO_DATA"},
                    {"data": "TIPO_ACAO_MARKETING_DESCRICAO"},
                    {"data": "ID_MARKETING_EVENTO"},
                ],
                dom: 'Bfrtip',
                buttons: [
                    {   "text": "{!! trans('messages.inclusao') !!}",
                        "action": function ( e, dt, node, config ) {
                            $('#inc').click();
                        }
                    },
                    {   "text": "{!! trans('messages.alteracao') !!}",
                        "action": function ( e, dt, node, config ) {
                            $('#alt').click();
                        }
                    },
                    {   "text": "{!! trans('messages.exclusao') !!}",
                        "action": function ( e, dt, node, config ) {
                            $('#exc').click();
                        }
                    },
                    'copy', 'excel', 'pdf', 'print'
                ],
                language: {
                    "sLengthMenu"  : "{!!  trans('messages.sLengthMenu') !!}",
                    "sZeroRecords" : "{!!  trans('messages.sZeroRecords') !!}",
                    "sInfo"        : "{!!  trans('messages.sInfo') !!}",
                    "sInfoEmpty"   : "{!!  trans('messages.sInfoEmpty') !!}",
                    "sInfoFiltered": "{!!  trans('messages.sInfoFiltered') !!}",
                    "sSearch"      : "{!!  trans('messages.sSearch') !!}",
                    "oPaginate": {
                        "sFirst"   : "{!!  trans('messages.sFirst') !!}",
                        "sPrevious": "{!!  trans('messages.sPrevious') !!}",
                        "sNext"    : "{!!  trans('messages.sNext') !!}",
                        "sLast"    : "{!!  trans('messages.sLast') !!}"
                    }
                },
                Sorting: [[0, 'desc']],
                columnDefs: [{
                    targets: [3],
                    visible: false,
                    sWidth: "300px"
                }
                ]
            });

            // rotina para selecionar a linha
            $('#table2 tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    oTable.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            } );

            // click do botão de inclusão
            $('#inc').on('click', function () {
                location.href="{!! asset('marketingevento/create') !!}";
            });

            // botão de alteração
            $('#alt').on('click', function() {
                // teste se selecionou uma linha
                $_data = oTable.row('.selected').data();
                if ($_data == null) {
                    bootbox.alert("{!! trans('messages.sSelecione') !!}");
                }
                else {
                    // pega o código da cidade
                    $_id = $_data['CONTA_ID'];
                    url = '{{ asset('marketingevento/edit')  }}/' + $_id;
                    location.href=url;
                }
            });

            // botão de exclusão
            $('#exc').on('click', function() {
                // teste se selecionou uma linha
                var $_data = oTable.row('.selected').data();
                if ($_data == null) {
                    //alert('Selecione um registro');
                    bootbox.alert("{!! trans('messages.sSelecione') !!}");
                }
                else {
                    var _descr = $_data['CONTA_NOME'];
                    bootbox.dialog({
                        title  : "{!! trans('messages.exclusao') !!}",
                        message: "{!! trans('messages.exc_marketingevento') !!}" + _descr + "?",
                        buttons:{
                            yes: {
                                label:"Sim",
                                className: "btn-danger",
                                callback: function() {
                                    // pega o código da cidade
                                    var $_id = $_data['CONTA_ID'];
                                    var url = '{{ asset('marketingevento/destroy')  }}/' + $_id;
                                    //location.href=url;
                                    //alert(url);
                                    $.ajax({
                                        type: "get",
                                        url: url,
                                        async: true,
                                        dataType: "html",
                                        success: function (xdata) {
                                            //alert('funcionou !');
                                            $_data = oTable.row('.selected').remove().draw();
                                        },
                                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                                            alert("Erro!" + textStatus);
                                        }
                                    })
                                }
                            },
                            no: {
                                label:"Não",
                                className: "btn-default"
                            }
                        }
                    });
                }
            });
        })
    </script>


<script>
    // rotina para posiciona depois da inclusão
    $.fn.dataTable.Api.register('row().show()', function() {
        var page_info = this.table().page.info();
        // Get row index
        var new_row_index = this.index();
        // Row position
        var row_position = this.table().rows()[0].indexOf( new_row_index );
        // Already on right page ?
        if( row_position >= page_info.start && row_position < page_info.end ) {
            // Return row object
            return this;
        }
        // Find page number
        var page_to_display = Math.floor( row_position / this.table().page.len() );
        // Go to that page
        this.table().page( page_to_display );
        // Return row object
        return this;
    });
</script>

@stop
