<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        <h1>Jogadores</h1>
    </div>
    <div class="content">
        <div class="row">
            <button id="inc"    hidden="true" class="bootstrap-modal-form-open">Inclusão</button>
            <button id="alt"    hidden="true" class="bootstrap-modal-form-open">Alteração</button>
            <button id="exc"    hidden="true" class="bootstrap-modal-form-open">Exclusão</button>
        </div>

        <div class="row" >
            <table class="display" id="tabela" width="80%">
                <thead>
                <tr>
                    <th width="20%">Apelido</th>
                    <th width="60%">Nome completo</th>
                    <th width="10%">Posição</th>
                    <th width="20%">Data de Nascimento</th>
                    <th width="10%">Idade</th>
                    <th width="20%">ID</th>
                </tr>
                </thead>
            </table>
        </div>

        <div id="saida">
        </div>

        <script>
            var oTable;
            $(document).ready(function() {
                $('#tabela').css('width', '100%');

                oTable = $('#tabela').DataTable({
                    "searching": true,
                    "ordering": false,
                    "paging": true,
                    "ajax": "{{ asset( 'jogadores/_json' ) }}",
                    bAutoWidth:true,
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
                        {   "text": 'Exclusão',
                            "action": function ( e, dt, node, config ) {
                                $('#exc').click();
                            }
                        },
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
                    location.href="{!! asset('jogadores/create') !!}";
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
                        $_id = $_data['ID_JOGADOR'];
                        url = '{{ asset('jogadores/edit')  }}/' + $_id;
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
                            message: "Confirma Exclusão do jogador " + _descr + "?",
                            buttons:{
                                yes: {
                                    label:"Sim",
                                    className: "btn-danger",
                                    callback: function() {
                                        // pega o código da cidade
                                        var $_id = $_data['ID_JOGADOR'];
                                        var url = '{{ asset('jogadores/destroy')  }}/' + $_id;
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
                    bootbox.alert("Informe o apelido do jogador");
                    return false;
                }

                if ( $('#JOG_NOME_COMPLETO').val() == ''){
                    //alert("entrou validação 3");
                    bootbox.alert("Informe o nome do jogador");
                    return false;
                }

                if ( $('#JOG_DT_NASCIMENTO').val() == ''){
                    //alert("entrou validação 3");
                    bootbox.alert("Informe a data de nascimento do jogador");
                    return false;
                }
                return true;
            }
        </script>
    </div>
@stop
