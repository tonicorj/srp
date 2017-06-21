<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        <h1>Ocorrência de Jogadores</h1>
    </div>
    <div class="content">
        <div class="row">
            <button id="inc"    hidden="true" class="bootstrap-modal-form-open">Inclusão</button>
            <button id="alt"    hidden="true" class="bootstrap-modal-form-open">Alteração</button>
            <button id="exc"    hidden="true" class="bootstrap-modal-form-open">Exclusão</button>
        </div>

        <div class="row" >
            <table class="display" id="table2">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Jogador</th>
                    <th>Descricao</th>
                    <th>Categoria</th>
                </tr>
                </thead>
            </table>
        </div>

        <div id="saida">
        </div>

        <script>
            var oTable;
            $(document).ready(function() {
                //$('#table2').css('width', '50%');
                oTable = $('#table2').DataTable({
                    "searching": true,
                    "ordering": false,
                    "paging": true,
                    "ajax": "{{ asset( 'jogadorOcorrencias/_json' ) }}",
                    bAutoWidth:true,
                    columns: [
                        {"data": "OCORR_DATA"},
                        {"data": "JOG_NOME_APELIDO"},
                        {"data": "OCORR_DESCRICAO"},
                        {"data": "CATEG_DESCRICAO"},
                        {"data": "ID_JOGADOR_OCORRENCIA"}
                    ],
                    dom: 'Bfrtip',
                    buttons: [
                        {   "text": 'Inclusão',
                            "action": function ( e, dt, node, config ) {
                                $('#inc').click();
                            }
                        },
                        {   "text": 'Alteração',
                            "action": function ( e, dt, node, config ) {
                                $('#alt').click();
                            }
                        },
                        @can('previlegiado')
                        {   "text": 'Exclusão',
                            "action": function ( e, dt, node, config ) {
                                $('#exc').click();
                            }
                        },
                        @endcan
                        'copy', 'excel', 'pdf', 'print'
                    ],
                    language: {
                        "sLengthMenu": "Mostrar _MENU_ registros por página",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                        "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
                        "sInfoFiltered": "(filtrado de _MAX_ registros)",
                        "sSearch": "Pesquisar: ",
                        "oPaginate": {
                            "sFirst": "Início",
                            "sPrevious": "Anterior",
                            "sNext": "Próximo",
                            "sLast": "Último"
                        }
                    },
                    Sorting: [[0, 'desc']],
                    columnDefs: [{
                        targets: [4],
                        visible: false,
                        sWidth: "300px"
                        },
                        {
                            targets: [1],
                            sWidth:"150px"
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
                    location.href="{!! asset('jogadorOcorrencias/create') !!}";
                });

                // botão de alteração
                $('#alt').on('click', function() {
                    // teste se selecionou uma linha
                    $_data = oTable.row('.selected').data();
                    if ($_data == null) {
                        bootbox.alert('Selecione um registro');
                    }
                    else {
                        // pega o código da cidade
                        $_id = $_data['ID_JOGADOR_OCORRENCIA'];
                        url = '{{ asset('jogadorOcorrencias/edit')  }}/' + $_id;
                        location.href=url;
                    }
                });

                // botão de exclusão
                $('#exc').on('click', function() {
                    // teste se selecionou uma linha
                    var $_data = oTable.row('.selected').data();
                    if ($_data == null) {
                        //alert('Selecione um registro');
                        bootbox.alert('Selecione um registro');
                    }
                    else {
                        var _descr = $_data['JOG_NOME_APELIDO'];
                        bootbox.dialog({
                            title  : "Exclusão",
                            message: "Confirma Exclusão da ocorrência deste jogador " + _descr + "?",
                            buttons:{
                                yes: {
                                    label:"Sim",
                                    className: "btn-danger",
                                    callback: function() {
                                        var $_id = $_data['ID_JOGADOR_OCORRENCIA'];
                                        var url = '{{ asset('jogadorOcorrencias/destroy')  }}/' + $_id;
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
    </div>
@stop
