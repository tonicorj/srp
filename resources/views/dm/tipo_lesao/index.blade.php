<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{!! trans('messages.t_tipo_lesao') !!}</h4>
            </div>
            <div class="panel-body">
                <table class='table table-striped' id="tbl_">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>{{$titulos[0]}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tipo_lesoes as $reg)
                        <tr>
                            <td>{{$reg->ID_TIPO_LESAO}}</td>
                            <td>{{$reg->TIPO_LESAO_DESCRICAO}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#tbl_').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "order": [[ 1, 'asc' ]],
                "ordering": true,
                "info": false,
                "autoWidth": true,
                "columnDefs": [
                    {"visible": false, "targets": [0]}
                ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        "className": "{!! trans('messages.i_incluir')!!}",
                        "titleAttr": "{!! trans('messages.inclusao')!!}",
                        "action": function (e, dt, node, config) {
                            location.href = "{!! asset('DM/tipo_lesao/create') !!}";
                        }
                    },
                    {
                        "className": "{!! trans('messages.i_alterar')!!}",
                        "titleAttr": "{!! trans('messages.alteracao')!!}",
                        "action": function (e, dt, node, config) {
                            //dados = $('#tbl_').row('.selected').data();
                            dados = $('#tbl_').DataTable().row('.selected').data();
                            if (dados == null) {
                                bootbox.alert("{!! trans('messages.sSelecione') !!}");
                            }
                            else {
                                // pega o código
                                id = dados[0];
                                url = '{{ asset('dm')  }}/' + id + '/edit';
                                location.href = url;
                            }
                        }
                    },
                    {
                        "className": "{!! trans('messages.i_excluir')!!}",
                        "titleAttr": "{!! trans('messages.exclusao')!!}",
                        "action": function (e, dt, node, config) {
                            // teste se selecionou uma linha
                            var dados = $('#tbl_').DataTable().row('.selected').data();
                            if (dados == null) {
                                //alert('Selecione um registro');
                                bootbox.alert("{!! trans('messages.sSelecione') !!}");
                            }
                            else {
                                var _descr = dados[1];
                                bootbox.dialog({
                                    title: "{!! trans('messages.exclusao') !!}",
                                    message: "{!! trans('messages.exc_tipo_lesao') !!}" + _descr + "?",
                                    buttons: {
                                        yes: {
                                            label: "Sim",
                                            className: "btn-danger",
                                            callback: function () {
                                                // pega o código
                                                var id = dados[0];
                                                var url = '{{ asset('DM/tipo_lesao')  }}/' + $_id + '/destroy';
                                                //location.href=url;
                                                //alert(url);
                                                $.ajax({
                                                    type: "get",
                                                    url: url,
                                                    async: true,
                                                    dataType: "html",
                                                    success: function (xdata) {
                                                        //alert('funcionou !');
                                                        $_data = $('#tbl_').DataTable().row('.selected').remove().draw();
                                                        //oTable.row('.selected').remove().draw();
                                                    },
                                                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                                                        alert("Erro!" + textStatus);
                                                    }
                                                })
                                            }
                                        },
                                        no: {
                                            label: "Não",
                                            className: "btn-default"
                                        }
                                    }
                                });
                            }
                        }
                    },
                    {
                        "className": "{!! trans('messages.i_copiar')!!}",
                        "titleAttr": "{!! trans('messages.copiar')!!}",
                        "action": function (e, dt, node, config) {
                        }
                    }
                ],
                "language": {
                    "sLengthMenu": "{!!  trans('messages.sLengthMenu') !!}",
                    "sZeroRecords": "{!!  trans('messages.sZeroRecords') !!}",
                    "sInfo": "{!!  trans('messages.sInfo') !!}",
                    "sInfoEmpty": "{!!  trans('messages.sInfoEmpty') !!}",
                    "sInfoFiltered": "{!!  trans('messages.sInfoFiltered') !!}",
                    "sSearch": "",
                    "oPaginate": {
                        "sFirst": "{!!  trans('messages.sFirst') !!}",
                        "sPrevious": "{!!  trans('messages.sPrevious') !!}",
                        "sNext": "{!!  trans('messages.sNext') !!}",
                        "sLast": "{!!  trans('messages.sLast') !!}"
                    }
                }
            });

            $('.dataTables_filter input').addClass('form-control pull-right');
            $('.dataTables_filter input').attr('placeholder', 'Pesquisa');

            // rotina para selecionar a linha
            $('#tbl_ tbody').on('click', 'tr', function () {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                }
                else {
                    $('#tbl_ tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
        });
    </script>
@stop
