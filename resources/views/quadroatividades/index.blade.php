<?php header ('Content-type: text/html; charset=UTF-8'); ?>
@extends('template')


@section('content')
    <!-- fullcalendar    -->
    {!!Html::style("plugins/fullcalendar/fullcalendar.min.css")!!}
    {!!Html::script('plugins/fullcalendar/lib/moment.min.js')!!}
    {!!Html::script('plugins/fullcalendar/fullcalendar.js')!!}
    {!!Html::script('plugins/fullcalendar/locale-all.js')!!}

    <div class="content-header">
        <div >
            <h2>
                {!! trans('messages.t_quadroatividades') !!}
                {{$periodo}}
            </h2>
            <!--
            <button id="b_calendario"
                    name="b_calendario"
                    class="glyphicon glyphicon-calendar"
                    data-toggle="modal"
                    data-target="#myModal">
                {!! trans('messages.tit_selecioneperiodo') !!}
            </button> -->
            <button  id="b_calendario"
                     name="b_calendario"
                     class="btn glyphicon glyphicon-calendar"
                    data-toggle="modal"
                    data-target="#myModal">
            </button>
            <span>
            {!! trans('messages.tit_selecioneperiodo') !!}
            </span>
        </div>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr class="bg-success">
                <th>{!! trans('messages.tit_quadroatividade_periodo') !!}</th>
                <th>
                    {!! trans('messages.tit_quadroatividade_segunda') !!}
                    <br>{{$dia['segunda']}}
                </th>
                <th>
                    {!! trans('messages.tit_quadroatividade_terca') !!}
                    <br>{{$dia['terca']}}
                </th>
                <th>
                    {!! trans('messages.tit_quadroatividade_quarta') !!}
                    <br>{{$dia['quarta']}}
                </th>
                <th>
                    {!! trans('messages.tit_quadroatividade_quinta') !!}
                    <br>{{$dia['quinta']}}
                </th>
                <th>
                    {!! trans('messages.tit_quadroatividade_sexta') !!}
                    <br>{{$dia['sexta']}}
                </th>
                <th>
                    {!! trans('messages.tit_quadroatividade_sabado') !!}
                    <br>{{$dia['sabado']}}
                </th>
                <th>
                    {!! trans('messages.tit_quadroatividade_domingo') !!}
                    <br>{{$dia['domingo']}}
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($atividades as $atividade)
            <tr>
                <td width="'5%'" class="bg-success">
                    {!! trans('messages.tit_horario') !!}<br>
                    {!! trans('messages.tit_local') !!}<br>
                    <h3>{{ $atividade->QUADRO_ATIVIDADE_POSICAO }}</h3>
                </td>

                <td width="13%" class="text-center">
                    {{ $atividade->QUADRO_ATIVIDADE_HORA_2 }}<br>
                    <div class="bg-danger">
                        {{ $atividade->QUADRO_ATIVIDADE_LOCAL_2 }} <br>
                    </div>
                    {{ $atividade->ATIVIDADE1_2 }} <br>
                    {{ $atividade->ATIVIDADE2_2 }} <br>
                    {{ $atividade->ATIVIDADE3_2 }} <br>
                    {{ $atividade->QUADRO_ATIVIDADE_COMPLEMENTO_2 }} <br>
                    <a href="{!! asset('quadroatividades') .'/edit/' . $atividade->ID_QUADRO_ATIVIDADE_2 !!}">
                    <button class="btn glyphicon glyphicon-pencil">
                    </button>
                    </a>

                </td>

                <td width="13%" class="text-center">
                    {{ $atividade->QUADRO_ATIVIDADE_HORA_3 }}<br>
                    <div class="bg-danger">
                        {{ $atividade->QUADRO_ATIVIDADE_LOCAL_3 }} <br>
                    </div>
                    {{ $atividade->ATIVIDADE1_3 }} <br>
                    {{ $atividade->ATIVIDADE2_3 }} <br>
                    {{ $atividade->ATIVIDADE3_3 }} <br>
                    {{ $atividade->QUADRO_ATIVIDADE_COMPLEMENTO_3 }} <br>
                    <a href="{!! asset('quadroatividades') .'/edit/' . $atividade->ID_QUADRO_ATIVIDADE_3 !!}">
                        <button class="btn glyphicon glyphicon-pencil">
                        </button>
                    </a>
                </td>

                <td width="13%" class="text-center">
                    {{ $atividade->QUADRO_ATIVIDADE_HORA_4 }}<br>
                    <div class="bg-danger">
                        {{ $atividade->QUADRO_ATIVIDADE_LOCAL_4 }} <br>
                    </div>
                    {{ $atividade->ATIVIDADE1_4 }} <br>
                    {{ $atividade->ATIVIDADE2_4 }} <br>
                    {{ $atividade->ATIVIDADE3_4 }} <br>
                    {{ $atividade->QUADRO_ATIVIDADE_COMPLEMENTO_4 }} <br>
                    <a href="{!! asset('quadroatividades') .'/edit/' . $atividade->ID_QUADRO_ATIVIDADE_4 !!}">
                        <button class="btn glyphicon glyphicon-pencil">
                        </button>
                    </a>
                </td>

                <td width="13%" class="text-center">
                    {{ $atividade->QUADRO_ATIVIDADE_HORA_5 }}<br>
                    <div class="bg-danger">
                        {{ $atividade->QUADRO_ATIVIDADE_LOCAL_5 }} <br>
                    </div>
                    {{ $atividade->ATIVIDADE1_5 }} <br>
                    {{ $atividade->ATIVIDADE2_5 }} <br>
                    {{ $atividade->ATIVIDADE3_5 }} <br>
                    {{ $atividade->QUADRO_ATIVIDADE_COMPLEMENTO_5 }} <br>
                    <a href="{!! asset('quadroatividades') .'/edit/' . $atividade->ID_QUADRO_ATIVIDADE_5 !!}">
                        <button class="btn glyphicon glyphicon-pencil">
                        </button>
                    </a>
                </td>

                <td width="13%" class="text-center">
                    {{ $atividade->QUADRO_ATIVIDADE_HORA_6 }}<br>
                    <div class="bg-danger">
                        {{ $atividade->QUADRO_ATIVIDADE_LOCAL_6 }} <br>
                    </div>
                    {{ $atividade->ATIVIDADE1_6 }} <br>
                    {{ $atividade->ATIVIDADE2_6 }} <br>
                    {{ $atividade->ATIVIDADE3_6 }} <br>
                    {{ $atividade->QUADRO_ATIVIDADE_COMPLEMENTO_6 }} <br>
                    <a href="{!! asset('quadroatividades') .'/edit/' . $atividade->ID_QUADRO_ATIVIDADE_6 !!}">
                        <button class="btn glyphicon glyphicon-pencil">
                        </button>
                    </a>
                </td>

                <td width="13%" class="text-center">
                    {{ $atividade->QUADRO_ATIVIDADE_HORA_7 }}<br>
                    <div class="bg-danger">
                        {{ $atividade->QUADRO_ATIVIDADE_LOCAL_7 }} <br>
                    </div>
                    {{ $atividade->ATIVIDADE1_7 }} <br>
                    {{ $atividade->ATIVIDADE2_7 }} <br>
                    {{ $atividade->ATIVIDADE3_7 }} <br>
                    {{ $atividade->QUADRO_ATIVIDADE_COMPLEMENTO_7 }} <br>
                    <a href="{!! asset('quadroatividades') .'/edit/' . $atividade->ID_QUADRO_ATIVIDADE_7 !!}">
                        <button class="btn glyphicon glyphicon-pencil">
                        </button>
                    </a>
                </td>

                <td width="13%" class="text-center">
                    {{ $atividade->QUADRO_ATIVIDADE_HORA_1 }}<br>
                    <div class="bg-danger">
                        {{ $atividade->QUADRO_ATIVIDADE_LOCAL_1 }} <br>
                    </div>
                    {{ $atividade->ATIVIDADE1_1 }} <br>
                    {{ $atividade->ATIVIDADE2_1 }} <br>
                    {{ $atividade->ATIVIDADE3_1 }} <br>
                    {{ $atividade->QUADRO_ATIVIDADE_COMPLEMENTO_1 }} <br>
                    <a href="{!! asset('quadroatividades') .'/edit/' . $atividade->ID_QUADRO_ATIVIDADE_1 !!}">
                        <button class="btn glyphicon glyphicon-pencil">
                        </button>
                    </a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Campo da data selecionada -->
    {!! Form::hidden ('data_calendario', null, ['class'=>'form-control input-sm', 'id'=>'data_calendario']) !!}

    <div id="saida">
    </div>

    <div class="row">
        <div class="col-lg-1">
            <h3>{!! trans('messages.tit_observacoes') !!}</h3>
        </div>
    </div>

    @foreach ($observacoes as $obs)
    <div class="row">
        <div class="col-lg-10">{{ $obs->QUADRO_ATIVIDADE_OBS1 }}</div>
    </div>
    <div class="row">
        <div class="col-lg-10">{{ $obs->QUADRO_ATIVIDADE_OBS2 }}</div>
    </div>
    <div class="row">
        <div class="col-lg-10">{{ $obs->QUADRO_ATIVIDADE_OBS3 }}</div>
    </div>
    @endforeach

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" >
        <div class="modal-dialog" style="width: 900px;height: 400px;">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{!! trans('messages.tit_calendario') !!}</h4>
                </div>
                <div class="modal-body">
                    <div id='calendar'></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="chamanovadata();">
                        {!! trans('messages.tit_selecionedata') !!}
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {!! trans('messages.tit_fechar') !!}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                defaultDate: '2016-12-12',
                locale: 'pt-br',
                header: {
                    center: 'title'
                },
                selectable: true,
                editable: true,
                select: function(start, end) {
                    $('#data_calendario').val( start.format());
                },
                eventLimit: true // allow "more" link when too many events
            });
        });

        $("#myModal").on('shown.bs.modal',  function () {
            $('#calendar').fullCalendar('render');
        });

        function chamanovadata(){
            var pagina = '{!! asset('quadroatividades') !!}';
            pagina = pagina + '/' + $('#data_calendario').val();
            //alert(pagina);
            window.location.href = pagina;
        }
    </script>

@stop
