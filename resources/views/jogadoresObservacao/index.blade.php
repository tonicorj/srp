<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        <h1>{!! trans('messages.t_jogobservacao') !!}</h1>
    </div>
    <div class="content">
        <div class="row">
            <button id="inc"    hidden="true" class="bootstrap-modal-form-open">{!! trans('messages.inclusao') !!}</button>
            <button id="alt"    hidden="true" class="bootstrap-modal-form-open">{!! trans('messages.alteracao') !!}</button>
            <button id="exc"    hidden="true" class="bootstrap-modal-form-open">{!! trans('messages.exclusao') !!}</button>
        </div>

        <div class="row" >
            <table class="display" id="tabela" width="80%">
                <thead>
                <tr>
                    <th width="20%">{!! trans('messages.tit_apelido') !!}</th>
                    <th width="60%">{!! trans('messages.tit_nomecompleto') !!}</th>
                    <th width="10%">{!! trans('messages.tit_posicao') !!}</th>
                    <th width="20%">{!! trans('messages.tit_datanascimento') !!}</th>
                    <th width="10%">{!! trans('messages.tit_idade') !!}</th>
                    <th width="20%">{!! trans('messages.tit_id') !!}</th>
                </tr>
                </thead>
            </table>
        </div>

        <div id="saida">
        </div>

        <script>
            jQuery.extend( jQuery.fn.dataTableExt.oSort, {
                "date-br-pre": function ( a ) {
                    if (a == null || a == "") {
                        return 0;
                    }
                    var brDatea = a.split('/');
                    return (brDatea[2] + brDatea[1] + brDatea[0]) * 1;
                },

                "date-br-asc": function ( a, b ) {
                    return ((a < b) ? -1 : ((a > b) ? 1 : 0));
                },

                "date-br-desc": function ( a, b ) {
                    return ((a < b) ? 1 : ((a > b) ? -1 : 0));
                }
            } );

            var oTable;
            $(document).ready(function() {
                $('#tabela').css('width', '100%');

                oTable = $('#tabela').DataTable({
                    "searching": true,
                    "ordering": false,
                    "paging": true,
                    "ajax": "{{ asset( 'jogadoresObservacao/_json' ) }}",
                    bAutoWidth:true,
                    columnDefs: [
                        { type: 'date-br', targets: 3 }

                    ],
                    columns: [
                        {"data": "JOG_NOME_APELIDO"},
                        {"data": "JOG_NOME_COMPLETO"},
                        {"data": "JOG_POSICAO"},
                        {"data": "JOG_DT_NASCIMENTO"},
                        {"data": "JOG_IDADE"},
                        {"data": "ID_JOGADOR"}
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
                        targets: [5],
                        visible: false,
                        sWidth: "300px"
                        }
                    ]
                });

                oTable.buttons().container()
                        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );

                // rotina para selecionar a linha
                $('#tabela tbody').on( 'click', 'tr', function () {
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
                    location.href="{!! asset('jogadoresObservacao/create') !!}";
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
                        $_id = $_data['ID_JOGADOR'];
                        url = '{{ asset('jogadoresObservacao/edit')  }}/' + $_id;
                        location.href=url;
                    }
                });

                // botão de exclusão
                $('#exc').on('click', function() {
                    // teste se selecionou uma linha
                    var $_data = oTable.row('.selected').data();
                    if ($_data == null) {
                        //alert('Selecione um registro');
                        bootbox.alert("{!! trans('messages.sSelecion') !!}");
                    }
                    else {
                        var _descr = $_data['JOG_NOME_APELIDO'];
                        bootbox.dialog({
                            title  : "{!! trans('messages.exclusao') !!}",
                            message: "{!! trans('messages.exc_jogador') !!}" + _descr + "?",
                            buttons:{
                                yes: {
                                    label:"Sim",
                                    className: "btn-danger",
                                    callback: function() {
                                        // pega o código da cidade
                                        var $_id = $_data['ID_JOGADOR'];
                                        var url = '{{ asset('jogadoresObservacao/destroy')  }}/' + $_id;
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
            function validacao() {
                if ( $('#JOG_NOME_APELIDO').val() == ''){
                    //alert("entrou validação 2");
                    bootbox.alert("{!! trans('messages.crit_apelido') !!}");
                    return false;
                }

                if ( $('#JOG_NOME_COMPLETO').val() == ''){
                    //alert("entrou validação 3");
                    bootbox.alert("{!! trans('messages.crit_nomecompleto') !!}");
                    return false;
                }

                if ( $('#JOG_DT_NASCIMENTO').val() == ''){
                    //alert("entrou validação 3");
                    bootbox.alert("{!! trans('messages.crit_datanascimento') !!}");
                    return false;
                }
                return true;
            }
        </script>
    </div>
@stop
