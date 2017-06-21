<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="content-header">
        <h1>Cidades</h1>
    </div>
    <div class="content">
        <div class="row">
            <button id="inc"    hidden="true">Inclusão</button>
            <button id="alt"    hidden="true">Alteração</button>
            <button id="exc"    hidden="true">Exclusão</button>
        </div>

        <div class="row">
            <table class="display" id="table2">
                <thead>
                <tr>
                    <th>Nome da Cidade</th>
                    <th>UF</th>
                    <th>País</th>
                </tr>
                </thead>
            </table>
        </div>

        <div id="saida">
        </div>

        <script>
            var oTable;
            $(document).ready(function() {
                oTable = $('#table2').DataTable({
                    "searching": true,
                    "ordering": true,
                    "paging": true,
                    "ajax": "{{ asset( 'teste/teste_json' ) }}",
                    //responsive: true,
                    columns: [
                        {"data": "CIDADE_NOME"},
                        {"data": "UF"},
                        {"data": "PAIS_NOME"},
                        {"data": "ID_CIDADE"}
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
                        targets: [3],
                        visible: false
                        }
                    ]
                    //language: dt_lang
                    /*
                     select: true,
                     TableTools: {
                     "sSwfPath": "../../js/DataTables-1.9.4/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
                     "aButtons": [
                     {
                     "sExtends": "xls",
                     "sButtonText": "Exportar para Excel",
                     "sTitle": "Usuarios",
                     "mColumns": [0, 1, 2, 3]
                     },
                     {
                     "sExtends": "pdf",
                     "sButtonText": "Exportar para PDF",
                     "sTitle": "Usuarios,
                     "sPdfOrientation": "landscape",
                     "mColumns": [0, 1, 2, 3]
                     }
                     ]
                     },
                     */
                });

                oTable.buttons().container()
                        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );

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

                // função para abrir o modal
                function loadModal(idM, idT, url) {
                    if ( idM == null ){
                        $.ajax({
                            url: url,
                            dataType: "html"
                        });
                    }
                    else {
                        $.ajax({
                            url: url,
                            dataType: "html",
                            success: function(data) {
                                $('#' + idT ).html(data);
                            }
                        });
                        $("#" + idM).modal('show');
                    }
                }

                // click do botão de inclusão
                $('#inc').on('click', function () {
                    loadModal(
                            'modal_inc'
                            , 'body_inc'
                            , '{{ asset('teste/create')  }}'
                    );
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
                        $_id = $_data['ID_CIDADE'];
                        url = '{{ asset('teste/edit')  }}/' + $_id;

                        // chama o modal
                        loadModal(
                                'modal_alt'
                                , 'body_alt'
                                , url
                        );
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
                        var _cidade = $_data['CIDADE_NOME'];
                        bootbox.dialog({
                            title  : "Exclusão",
                            message: "Confirma Exclusão da cidade " + _cidade + "?",
                            buttons:{
                                yes: {
                                    label:"Sim",
                                    className: "btn-danger",
                                    callback: function() {
                                        // pega o código da cidade
                                        var $_id = $_data['ID_CIDADE'];
                                        var url = '{{ asset('teste/destroy')  }}/' + $_id;

                                        // chama o modal
                                        loadModal( null, null, url );

                                        $_data = oTable.row('.selected').remove().draw();
                                    }
                                },
                                no: {
                                    label:"Não",
                                    className: "btn-default"
                                }
                            }
                        });
                    }
                })

            })
        </script>

        <div class="modal fade" id="modal_inc" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="fechar_inc">&times;</button>
                        <h3>Inclusão - Cidades</h3>
                    </div>
                    <div class="modal-body">
                        <div id="body_inc">
                        </div>
                    </div>
                    <div class="modal-footer" id="rodape">
                        <button type="button" class='btn btn-primary' data-dismiss="modal" onclick='inclusao();'>Inclui</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="s1">Sair</button>
                        <!--
                        <button class='btn btn-danger close' value='Atualiza2' onclick='alteracao();'>Atualiza2</button>
                        <input class='btn btn-primary close' type='submit' value='Inclui' onclick='inclusao();'>
                        -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_alt" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header panel-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="fechar_alt">&times;</button>
                        <h3>Alteração - Cidades</h3>
                    </div>
                    <div class="modal-body">
                        <div id="body_alt">
                        </div>
                    </div>
                    <div class="modal-footer" id="rodape">
                        <button type="button" class='btn btn-primary' data-dismiss="modal" onclick='alteracao();'>Atualiza</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="s2">Sair</button>
                        <!--
                        <input class='btn btn-primary close' type='submit' value='Atualiza' onclick='alteracao();'>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        -->
                    </div>
                </div>
            </div>
        </div>

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


            // função de alteração
            function alteracao() {
                //alert("entrou");

                var form = $('#form_inclusao');
                var formData = form.serialize();

                var url = '{{ asset('teste/update') }}';    //form.attr('action');
                url = url + '/' + $('#ID_CIDADE').val();
                //alert(url);

                // pega os valores do formulário para atualizar o grid
                var _id_cidade = $('#ID_CIDADE').val();
                var _cidade_nome = $('#CIDADE_NOME').val();
                var _uf = $('#UF').val();
                var _id_pais = $('#ID_PAIS').val();

                $.ajax({
                    type: "post",
                    url: url,
                    data: formData,
                    async: true,
                    dataType: "html",
                    success: function (data) {
                        // se não der erro, atualiza a linha no datatable
                        oTable.row('.selected').data({
                            'CIDADE_NOME': _cidade_nome,
                            'UF': _uf,
                            'ID_PAIS': _id_pais,
                            'ID_CIDADE': _id_cidade
                        });
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Erro!" + textStatus);
                    }
                });

                // fecha o modal
                $('#fechar_alt').click();
            }

            // rotina de inclusão
            function inclusao(){
                var form=$('#form_inclusao');
                var formData= form.serialize();
                var url=form.attr('action');

                var url = '{{ asset('teste/store') }}';    //form.attr('action');
                //url = url + '/' + $('#ID_CIDADE').val();

                $.ajax({
                    type    : "post",
                    url     : url,
                    data    : formData,
                    async   : true,
                    dataType: "json",
                    success : function(xdata){
                        // se não der erro, inclui a linha no datatable
                        oTable.row.add( {
                            'CIDADE_NOME'   : xdata.CIDADE_NOME,
                            'UF'            : xdata.UF,
                            'ID_PAIS'       : xdata.ID_PAIS,
                            'ID_CIDADE'     : xdata.ID_CIDADE
                        }).draw().show().draw(false);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Erro!" + textStatus);
                    }
                });
                // fecha o modal
                $('#fechar_inc').click();
            }

        </script>
    </div>
@stop
