<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{!! trans('messages.t_tipofase') !!}</h4>
            </div>
            <div class="panel-body">
                <table class='table table-striped' id="tbl_">
                    <thead>
                    <tr>
                        @foreach ($titulos as $tit)
                            <th>{{$tit}}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tipos as $reg)
                        <tr>
                            {!! Form::open(['route' => [ 'tipofase.destroy' ,'id' => $reg->ID_TIPOFASE]
                            , 'method' =>'DELETE'
                            , 'id' => "delete-form-{$reg->ID_TIPOFASE}"
                            , 'style' => 'display:none'
                            ]) !!}
                            {!! Form::close() !!}
                            <td>{{$reg->ID_TIPOFASE}}</td>
                            <td>{{$reg->TFASE_DESCRICAO}}</td>
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
                    //,{"visible": false, "targets": [0]}
                ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        "className": "{!! trans('messages.i_incluir')!!}",
                        "titleAttr": "{!! trans('messages.inclusao')!!}",
                        "action": function (e, dt, node, config) {
                            location.href = "{!! asset('jogos/tipofase/create') !!}";
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
                                url = '{{ asset('jogos/tipofase')  }}/' + id + '/edit';
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
                                var _id = dados[0];
                                var _nome = '#delete-form-' + _id;
                                //alert(_nome);

                                bootbox.dialog({
                                    title: "{!! trans('messages.exclusao') !!}",
                                    message: "{!! trans('messages.exc_tipofase') !!}" + _descr + "?",
                                    buttons: {
                                        yes: {
                                            label: "Sim",
                                            className: "btn-danger",
                                            callback: function () {
                                                $(_nome).submit();
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
            $('.dataTables_filter input').attr('placeholder', '{!!  trans('messages.pesquisa') !!}');

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
