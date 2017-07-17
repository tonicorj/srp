<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    @include('dm.dmacompanha.dmatend')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_dmacompanha') !!}</h4>
        </div>
        <div class="panel-body content">
            <table class='table table-striped' id="tbl_">
                <thead>
                <tr>
                    <th>id</th>
                    <th>{{$titulos[0]}}</th>
                    <th>{{$titulos[1]}}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($dmacompanha as $da)
                        <tr>
                            <td>{{$da->id_acompanhamento_dm}}</td>
                            <td>{{data_display($da->acompanhamento_data)}}</td>
                            <td>{{$da->medico_nome }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#tbl_').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": true,
                "columnDefs": [
                    {"visible": false, "targets": [0]},
                    {"targets":[1], "width":"20%"}
                    ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        "className": "{!! trans('messages.i_incluir')!!}",
                        "action": function (e, dt, node, config) {
                            var id = {{$dmatend->ID_DEPARTAMENTO_MEDICO}}
                            location.href = "{!! asset('DM/dmacompanha/create') !!}" + "?dm=" + id;
                        }
                    },
                    {
                        "className": "{!! trans('messages.i_alterar')!!}",
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
                        "action": function (e, dt, node, config) {
                            // teste se selecionou uma linha
                            var dados = $('#tbl_').DataTable().row('.selected').data();
                            if (dados == null) {
                                //alert('Selecione um registro');
                                bootbox.alert("{!! trans('messages.sSelecione') !!}");
                            }
                            else {
                                var _descr = dados[2];
                                bootbox.dialog({
                                    title: "{!! trans('messages.exclusao') !!}",
                                    message: "{!! trans('messages.exc_depmedico_dia') !!}" + _descr + "?",
                                    buttons: {
                                        yes: {
                                            label: "Sim",
                                            className: "btn-danger",
                                            callback: function () {
                                                // pega o código da cidade
                                                var id = dados[0];
                                                var url = '{{ asset('DM/dmacompanha')  }}/' + $_id + '/destroy';
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
                        "action": function (e, dt, node, config) {
                        }
                    },
                    {
                        "className": "fa fa-arrow-circle-left fa-2x",
                        "action": function (e, dt, node, config) {
                            url = '{{ asset('DM/depmedico')  }}';
                            location.href = url;
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
