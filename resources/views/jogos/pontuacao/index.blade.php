<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{!! trans('messages.tit_pontuacao') !!}</h4>
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
                    @foreach ($pontuacao as $reg)
                        <tr>
                            <td>{{$reg->ID_PONTUACAO}}</td>
                            <td>{{$reg->PONT_NOME}}</td>
                            <td>{{$reg->PONT_VITORIA}}</td>
                            <td>{{$reg->PONT_EMPATE}}</td>
                            <td>{{$reg->PONT_EMPATE0}}</td>
                            <td>{{$reg->PONT_VITORIA_PEN}}</td>
                            <td>{{$reg->PONT_DIF_GOLS}}</td>
                            <td>{{$reg->PONT_VIT_GOLS}}</td>
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
                dom: 'Bfrtip',
                "columnDefs": [
                    {"visible": false, "targets": [0]}
                ],
                buttons: [
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
