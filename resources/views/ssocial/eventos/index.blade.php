<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! trans('messages.t_eventos') !!}</h4>
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
                    @foreach ($eventos as $reg)
                        <tr>
                            {!! Form::open(['route' => [ 'eventos.destroy' ,'id' => $reg->ID_EVENTO]
                            , 'method' =>'DELETE'
                            , 'id' => "delete-form-{$reg->ID_EVENTO}"
                            , 'style' => 'display:none'
                            ]) !!}
                            {{ Form::close() }}
                            <td>{{$reg->ID_EVENTO}}</td>
                            <td>{{data_display($reg->EVENTO_DATA)}}</td>
                            <td>{{$reg->EVENTO_TITULO}}</td>
                            <td>{{$reg->EVENTO_LOCAL}}</td>
                            <td>{{$reg->CATEG_DESCRICAO}}</td>
                            <td>{{$reg->DEPARTAMENTO_DESCRICAO}}</td>
                            <td>{{$reg->EVENTO_EXTERNO}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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

        $(document).ready(function () {
            $('#tbl_').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "order": [[1, 'asc']],
                "info": false,
                "autoWidth": true,
                "columnDefs": [
                    {"targets": [0], "visible": false},
                    {"targets": [1], "type": "date-br"}
                ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        "className": "{!! trans('messages.i_incluir')!!}",
                        "titleAttr": "{!! trans('messages.inclusao')!!}",
                        "action": function (e, dt, node, config) {
                            location.href = "{!! asset('ssocial/eventos/create') !!}";
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
                                url = '{{ asset('ssocial/eventos')  }}/' + id + '/edit';
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
                                var _descr = dados[2];
                                var _id = dados[0];
                                var _nome = '#delete-form-' + _id;
                                bootbox.dialog({
                                    title: "{!! trans('messages.exclusao') !!}",
                                    message: "{!! trans('messages.exc_evento') !!}" + _descr + "?",
                                    buttons: {
                                        yes: {
                                            label: "Sim",
                                            className: "btn-danger",
                                            callback: function () {
                                                $(_nome).submit();                                            }
                                        },
                                        no: {
                                            label: "Não",
                                            className: "btn-default"
                                        }
                                    }
                                });
                            }
                        }
                    }
                    ,{
                        "className": "{!! trans('messages.i_copiar')!!}",
                        "titleAttr": "{!! trans('messages.copiar')!!}",
                        "action": function (e, dt, node, config) {
                        }
                    }
                    ,{
                        "className": "{!! trans('messages.i_jogador')!!}",
                        "titleAttr": "{!! trans('messages.tit_jogadores')!!}",
                        "action": function (e, dt, node, config) {
                            var dados = $('#tbl_').DataTable().row('.selected').data();                            if (dados == null) {
                                //alert('Selecione um registro');
                                bootbox.alert("{!! trans('messages.sSelecione') !!}");
                            }
                            else {
                                var _id = dados[0];
                                var _url = "{!!  asset('ssocial/eventosJogadores') !!}";
                                _url = _url + '?evento=' + _id;
                                //alert(_url);
                                $(location).attr('href',  _url );
                            }
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
