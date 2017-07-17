<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    @include('dm.dmacompanha.dmatend')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_dmcirurgia') !!}</h4>
        </div>
        <div class="panel-body content">
            <table class='table table-striped' id="tbl_">
                <thead>
                <tr>
                    <th>id</th>
                    <th>{{$titulos[0]}}</th>
                    <th>{{$titulos[1]}}</th>
                    <th>{{$titulos[2]}}</th>
                    <th>{{$titulos[3]}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($dmcirurgias as $dc)
                    <tr>
                        <td>{{$dc->id_dm_cirurgia}}</td>
                        <td>{{data_display($dc->cirurgia_data)}}</td>
                        <td>{{$dc->medico_nome }}</td>
                        <td>{{$dc->cirurgia_nome }}</td>
                        <td>{{data_display($dc->cirurgia_data_solicitacao)}}</td>
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
                "columnDefs": [ {"visible": false, "targets": [0]} ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        "className": '{!! trans('messages.i_incluir')!!}',
                        "action": function (e, dt, node, config) {
                            var id = {{$dmatend->ID_DEPARTAMENTO_MEDICO}};
                            location.href = "{!! asset('dm') !!}" + "?dm=" + id;
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
                                    message: "{!! trans('messages.exc_cirurgias') !!}" + _descr + "?",
                                    buttons: {
                                        yes: {
                                            label: "Sim",
                                            className: "btn-danger",
                                            callback: function () {
                                                // pega o código
                                                var id = dados[0];
                                                var url = '{{ asset('dm')  }}/' + $_id + '/destroy';
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
                            url = '{{ asset('DM/depmedico') }}';
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
