<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')

@section('content')
    <div class="alert titulo_index" >
        <h4>{!! trans('messages.t_depmedico_atendimento') !!}</h4>
    </div>
    <!--
    <div class="content">
        {!! Form::model(null, ['class' => 'form-group', 'method' => 'GET']) !!}
        <div class="row">
            <div class="col-lg-3">
                {!! Form::label('f_jogador', trans('messages.tit_jogador')) !!}
                {!! Form::text('f_jogador' , session('f_nome') ,['class' => 'form-control']) !!}
            </div>
            <div class="col-lg-1">
                {!! Form::label('f_medico', trans('messages.tit_medico')) !!}
                {!! Form::text('f_medico', session('f_medico'),['class' => 'form-control']) !!}
            </div>
            <div class="col-lg-2">
                {!! Form::label('f_data', trans('messages.tit_data')) !!}
                {!! Form::text('f_data' , session('f_data'), ['class' => 'form-control']) !!}
            </div>
            <div class="col-lg-2">
                {!! Button::primary()
                    ->small()
                    ->withAttributes(['class'=>  trans('messages.i_pesquisar') ])
                    ->submit()
                 !!}
                {!! Button::primary()
                    ->small()
                    ->asLinkTo(route('depmedico.create'))
                    ->withAttributes(['class'=>  trans('messages.i_incluir') ]) !!}
            </div>
            {!! Form::close() !!}
            </div>
        -->
        <div class="row">
            <div class="col-lg-12">
                <table class='table table-striped' id="tbl_">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Entrada</th>
                            <th>Saída</th>
                            <th>Jogador</th>
                            <th>Af</th>
                            <th>Tipo de Lesão</th>
                            <th>Origem da Lesão</th>
                            <th>Parte do Corpo</th>
                            <th>Médico</th>
                            <th>Dias</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($depmedicos as $dm)
                            <tr>
                                <td>{{$dm->id_departamento_medico}}</td>
                                <td>{{data_display($dm->dm_data_inicio)   }}</td>
                                <td>{{data_display($dm->dm_data_fim)      }}</td>
                                <td>{{$dm->jog_nome_apelido }}</td>
                                <td>{{$dm->flag_afastamento }}</td>
                                <td>{{$dm->tipo_lesao_descricao}}</td>
                                <td>{{$dm->origem_lesao_descricao}}</td>
                                <td>{{$dm->parte_corpo_descricao}}</td>
                                <td>{{$dm->medico_nome}}</td>
                                <td>{{$dm->dm_tempo_permanencia}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" id="paginacao" valign="center" >
            <div class="col-lg-12 col-sm-5">
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
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": true,
                "columnDefs": [
                    { visible: false,  targets: 0 },
                    { type: 'date-br', targets: 1}
                    ],
                dom: 'Bfrtip',
                buttons: [
                    {   "className": "{!! trans('messages.i_incluir')!!}",
                        "action": function ( e, dt, node, config ) {
                            location.href="{!! asset('DM/depmedico/create') !!}";
                        }
                    },
                    {   "className": "{!! trans('messages.i_alterar')!!}",
                        "action": function ( e, dt, node, config ) {
                            //dados = $('#tbl_').row('.selected').data();
                            dados = $('#tbl_').DataTable().row('.selected').data();
                            if (dados == null) {
                                bootbox.alert("{!! trans('messages.sSelecione') !!}");
                            }
                            else {
                                // pega o código da cidade
                                id  = dados[0];
                                url = '{{ asset('DM/depmedico')  }}/' + id + '/edit';
                                location.href=url;
                            }
                        }
                    },
                    {   "className": "{!! trans('messages.i_excluir')!!}",
                        "action": function ( e, dt, node, config ) {
                            // teste se selecionou uma linha
                            var dados = $('#tbl_').DataTable().row('.selected').data();
                            if (dados == null) {
                                //alert('Selecione um registro');
                                bootbox.alert("{!! trans('messages.sSelecione') !!}");
                            }
                            else {
                                var _descr = dados[3];
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
                                                var url = '{{ asset('DM/depmedico')  }}/' + $_id + '/destroy';
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
                    {   "className": "{!! trans('messages.i_copiar')!!}",
                        "action": function ( e, dt, node, config ) {
                        }
                    },
                    {   "className": "{!! trans('messages.i_dmacompanha')!!}",
                        "action": function ( e, dt, node, config ) {
                            //dados = $('#tbl_').row('.selected').data();
                            dados = $('#tbl_').DataTable().row('.selected').data();
                            if (dados == null) {
                                bootbox.alert("{!! trans('messages.sSelecione') !!}");
                            }
                            else {
                                // pega o código da cidade
                                id  = dados[0];
                                url = '{{ asset('DM/dmacompanha')  }}/?dm=' + id;
                                location.href=url;
                            }
                        }
                    },
                    {   "className": "{!! trans('messages.i_prontuario')!!}",
                        "action": function ( e, dt, node, config ) {
                            //dados = $('#tbl_').row('.selected').data();
                            dados = $('#tbl_').DataTable().row('.selected').data();
                            if (dados == null) {
                                bootbox.alert("{!! trans('messages.sSelecione') !!}");
                            }
                            else {
                                // pega o código da cidade
                                id  = dados[0];
                                url = '{{ asset('DM/prontuario')  }}/?dm=' + id;
                                location.href=url;
                            }
                        }
                    },
                    {   "className": "{!! trans('messages.i_dmexames')!!}",
                        "action": function ( e, dt, node, config ) {
                            //dados = $('#tbl_').row('.selected').data();
                            dados = $('#tbl_').DataTable().row('.selected').data();
                            if (dados == null) {
                                bootbox.alert("{!! trans('messages.sSelecione') !!}");
                            }
                            else {
                                // pega o código da cidade
                                id  = dados[0];
                                url = '{{ asset('DM/dmexames')  }}/?dm=' + id;
                                location.href=url;
                            }
                        }
                    },
                    {   "className": "{!! trans('messages.i_dmcirurgias')!!}",
                        "action": function ( e, dt, node, config ) {
                            //dados = $('#tbl_').row('.selected').data();
                            dados = $('#tbl_').DataTable().row('.selected').data();
                            if (dados == null) {
                                bootbox.alert("{!! trans('messages.sSelecione') !!}");
                            }
                            else {
                                // pega o código da cidade
                                id  = dados[0];
                                url = '{{ asset('DM/dmcirurgias')  }}/?dm=' + id;
                                location.href=url;
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
            $('#tbl_ tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    $('#tbl_ tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            } );

        });
    </script>

@stop

