<?php
header ('Content-type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        {!!Html::style('plugins/bootstrap/css/bootstrap.min.css')!!}                <!-- bootstrap -->
        {!!Html::style('plugins/datatables/css/datatables.bootstrap.min.css')!!}    <!-- datatable bootstrap -->
        {!!Html::style("plugins/AdminLTE/css/AdminLTE.min.css")!!}
        {!!Html::style("plugins/AdminLTE/css/skins/_all-skins.min.css")!!}
        {!!Html::style('plugins/datatables/css/jquery.dataTables.min.css')!!}       <!-- datatable jquery -->
        {!!Html::style("plugins/datatables/extensions/buttons/css/buttons.dataTables.min.css")!!}

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        {!!Html::script("https://code.jquery.com/jquery-1.12.4.js") !!}
        {!!Html::script("https://code.jquery.com/ui/1.12.1/jquery-ui.js")!!}

        {!!Html::style("https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css") !!}        <!-- Ionicons -->
        {!!Html::style("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css")!!}

        {!!Html::script('plugins/bootstrap/js/bootstrap.min.js')!!}                 <!-- bootstrap -->
        {!!Html::script('plugins/datatables/js/jquery.datatables.min.js')!!}        <!-- datatable jquery -->
        {!!Html::script("plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js")!!}
        {!!Html::script("plugins/datatables/extensions/Buttons/js/buttons.bootstrap.min.js")!!}

        <!-- buttons -->
        {!!Html::script("plugins/datatables/extensions/buttons/js/buttons.flash.min.js")!!}
        {!!Html::script("plugins/datatables/extensions/buttons/js/buttons.html5.min.js")!!}
        {!!Html::script("plugins/datatables/extensions/buttons/js/buttons.print.min.js")!!}

        {!!Html::script("plugins/datatables/extensions/jszip/jszip.min.js")!!}
        {!!Html::script("plugins/datatables/extensions/pdfmake/build/pdfmake.min.js")!!}
        {!!Html::script("plugins/datatables/extensions/pdfmake/build/vfs_fonts.js")!!}

        <!-- modal de confirmação -->
        {!!Html::script("plugins/datepicker/js/bootstrap-datepicker.min.js")!!}
        {!!Html::script("plugins/datepicker/locales/bootstrap-datepicker.pt-BR.min.js")!!}
        {!!Html::style("plugins/datepicker/css/bootstrap-datepicker.min.css")!!}

        <!-- modal de confirmação -->
        {!!Html::script("plugins/bootstrap-fileinput-master/js/fileinput.min.js")!!}

        <!--{!!Html::script("plugins/validador/src/laravel-bootstrap-modal-form.js")!!} -->

        {!!Html::script('plugins/bootboxjs/bootbox.min.js')!!}                                          <!-- modal de confirmação -->
        <!--{!!Html::script("js/lang.js")!!}                                                                <!-- linguagem -->


        {!!Html::script("plugins/AdminLTE/js/app.min.js")!!}
        {!!Html::style("css/app.css")!!}
    </head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
        <header class="main-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Left Side Of Navbar -->
                    <!-- Right Side Of Navbar -->
                    <div class="nav navbar-nav navbar-right navbar-btn">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categorias <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach( Auth::user()->categorias() as $categ )
                                    <li>
                                        <a href="#" onclick="mudaCategoria( {{$categ->id_categoria}}, '{{$categ->categ_descricao}}');">
                                            {{$categ->categ_descricao}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <button type="button" class="btn btn-danger" aria-haspopup="true" aria-expanded="false">
                                Logout
                            </button>
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{!! asset('imagens/logo.bmp') !!}" class="img-circle">
                    </div>
                    <div class="pull-left info">
                        <div>
                            <p>{{ Auth::user()->name }}</p>
                        </div>
                        <div id="_categoria">
                            {{Auth::user()->categoria_descricao()}}
                        </div>
                    </div>
                </div>
                <!-- search form -->

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">{!! trans('messages.t_menu_principal') !!}</li>
                    @can( 'acesso'
                    , array( 'JOGADORES'
                        , 'ATIVIDADES'
                        , 'JANELAS'
                        , 'LOCAL_ATIVIDADE'
                        , 'PARCEIROS'
                        , 'PE_DOMINANTE'
                        , 'QUADRO_ATIVIDADES'
                        , 'CATEGORIA'
                        ) )
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-soccer-ball-o"></i>
                                <span>{!! trans('messages.t_dep_futebol') !!}</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @can( 'acesso', 'QUADRO_ATIVIDADES')
                                <li><a href="{!! asset('quadroatividades') .'/'. 0 !!}"><i class="fa fa-calendar"></i> {!! trans('messages.t_quadroatividades') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'JOGADORES')
                                <li><a href="{!! asset('DFutebol\jogadores') !!}"><i class="fa fa-user"></i> {!! trans('messages.t_jogadores') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'CATEGORIA')
                                   <li><a href="{!! asset('DFutebol\categorias') !!}"><i class="fa fa-sort-alpha-asc"></i> {!! trans('messages.t_categoria') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'JANELAS')
                                <li><a href="{!! asset('DFutebol\janelas') !!}"><i class="fa fa-exchange"></i> {!! trans('messages.t_janelas') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'PARCEIROS')
                                <li><a href="{!! asset('DFutebol\parceiros') !!}">       <i class="fa fa-user-secret"></i> {!! trans('messages.t_parceiros') !!}</a></li>
                                @endcan
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-tag"></i> {!! trans('messages.cadastros') !!}
                                        <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        @can( 'acesso', 'ATIVIDADES')
                                            <li>
                                                <a href="{!! asset('adm\atividades') !!}">
                                                    <i class="fa fa-tag"></i> {!! trans('messages.t_atividade') !!}
                                                </a>
                                            </li>
                                        @endcan
                                        @can( 'acesso', 'LOCAL_ATIVIDADE')
                                            <li>
                                                <a href="{!! asset('DFutebol\localatividade') !!}">
                                                    <i class="fa fa-map-marker"></i> {!! trans('messages.t_localatividade') !!}
                                                </a>
                                            </li>
                                        @endcan
                                        @can( 'acesso', 'PE_DOMINANTE')
                                            <li><a href="{!! asset('DFutebol\pedominante') !!}"><i class="fa fa-arrows-h"></i> {!! trans('messages.t_pedominante') !!}</a></li>
                                        @endcan

                                        @can( 'acesso', 'POSICAO')
                                            <li><a href="{!! asset('DFutebol\posicoes') !!}"><i class="fa fa-map-pin"></i> {!! trans('messages.t_posicoes') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'SELECAO')
                                            <li>
                                                <a href="{!! asset('DFutebol/selecoes') !!}">
                                                    <i class="fa fa-flag-o"></i> {!! trans('messages.t_selecao') !!}
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @can( 'acesso'
                        , array( 'FUNCIONARIOS'
                            , 'AFASTAMENTO'
                            , 'ALOJAMENTOS'
                            , 'CARGOS'
                            , 'CIDADES'
                            , 'ESCOLARIDADES'
                            , 'ESTADOCIVIL'
                            , 'MOTIVO_AUSENCIA'
                            , 'MOTIVO_AFASTAMENTO'
                            , 'OCORRENCIAS_JOGADORES'
                            , 'PAISES'
                            , 'PROJETOS'
                            , 'SELECAO'
                            , 'TIPO_CONTRATO'
                        ) )
                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-inbox"></i>
                                <span>{!! trans('messages.t_administrativo') !!}</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @can( 'acesso', 'OCORRENCIAS_JOGADORES')
                                    <li><a href="{!! asset('adm/ocorrencias') !!}"> <i class="fa fa-tag"></i> {!! trans('messages.t_ocorrencias_jog') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'AFASTAMENTO')
                                    <li><a href="{!! asset('adm/afastamentos') !!}">     <i class="fa fa-external-link-square"></i> {!! trans('messages.t_afastamento') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'ALOJAMENTOS')
                                    <li><a href="{!! asset('adm/alojamentos') !!}">     <i class="fa fa-hotel"></i> {!! trans('messages.t_alojamento') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'FUNCIONARIOS')
                                    <li>
                                        <a href="{!! asset('adm/funcionarios') !!}">
                                            <i class="glyphicon glyphicon-user" aria-hidden="true"></i> {!! trans('messages.t_funcionarios') !!}
                                        </a>
                                    </li>
                                @endcan

                                <li class="treeview">
                                    <a href="#"><i class="fa fa-tag"></i> {!! trans('messages.cadastros') !!}
                                        <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        @can( 'acesso', 'CIDADES')
                                            <li><a href="{!! asset('adm/cidades') !!}"><i class="fa fa-industry"></i> {!! trans('messages.t_cidades') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'CARGOS')
                                            <li><a href="{!! asset('adm/cargos') !!}"><i class="fa fa-tag"></i> {!! trans('messages.t_cargo') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'DEPARTAMENTOS')
                                            <li><a href="{!! asset('adm/departamentos') !!}"><i class="fa fa-building"></i> {!! trans('messages.t_departamento') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'ESCOLARIDADES')
                                            <li><a href="{!! asset('adm\escolaridades') !!}"><i class="fa fa-graduation-cap"></i> {!! trans('messages.t_escolaridade') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'ESTADOCIVIL')
                                            <li><a href="{!! asset('adm\estadocivil') !!}"><i class="fa fa-tag"></i> {!! trans('messages.t_estadocivil') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'MOTIVO_AUSENCIA')
                                            <li><a href="{!! asset('adm/motivoAusencia') !!}"> <i class="fa fa-tag"></i> {!! trans('messages.t_motivoAusencia') !!}</a></li>
                                        @endcan
                                            @can( 'acesso', 'MOTIVO_AFASTAMENTO')
                                                <li><a href="{!! asset('adm/motivoafastamento') !!}"> <i class="fa fa-tag"></i> {!! trans('messages.t_motivoAfastamento') !!}</a></li>
                                            @endcan
                                        @can( 'acesso', 'PAISES')
                                            <li><a href="{!! asset('adm\paises') !!}"><i class="fa fa-globe"></i> {!! trans('messages.t_paises') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'TIPO_CONTRATO')
                                            <li><a href="{!! asset('contratos/tipocontrato') !!}">   <i class="fa fa-hand-pointer-o"></i> {!! trans('messages.t_tipo_contrato') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'PROJETOS')
                                            <li>
                                                <a href="{!! asset('projetos') !!}">
                                                    <i class="fa fa-circle-o"></i> {!! trans('messages.t_projeto') !!}
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can( 'acesso', array( 'JOGADORES_EM_OBSERVACAO' ) )
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-search"></i>
                                <span>{!! trans('messages.t_observacao') !!}</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @can( 'acesso', 'JOGADORES_EM_OBSERVACAO')
                                <li><a href="{!! asset('jogobservacao') !!}"> <i class="fa fa-search-plus"></i> {!! trans('messages.t_jogobservacao') !!}</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can( 'acesso', array(
                          'CIRURGIAS'
                        , 'CUIDADOS_ESPECIAIS'
                        , 'EXAMES'
                        , 'ORIGEM_LESAO'
                        , 'PARTE_CORPO'
                        , 'TIPO_LESAO'
                    ) )
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-ambulance"></i>
                                <span>{!! trans('messages.tit_depmedico') !!}</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                @can( 'acesso', 'REGISTRO_DM')
                                    <li><a href="{!! asset('dm/depmedico') !!}"> <i class="fa fa-user-md"></i> {!! trans('messages.t_depMedico') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'CUIDADOS_ESPECIAIS')
                                    <li><a href="{!! asset('dm/cuidados') !!}"> <i class="fa fa-user-md"></i> {!! trans('messages.t_cuidados') !!}</a></li>
                                @endcan
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-tag"></i> {!! trans('messages.cadastros') !!}
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        @can( 'acesso', 'CIRURGIAS')
                                            <li><a href="{!! asset('dm/cirurgias') !!}"> <i class="fa fa-heartbeat"></i> {!! trans('messages.t_cirurgias') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'EXAMES')
                                            <li><a href="{!! asset('dm/exames') !!}"> <i class="fa fa-stethoscope"></i> {!! trans('messages.t_exames') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'ORIGEM_LESAO')
                                            <li><a href="{!! asset('dm/origem_lesao') !!}"> <i class="fa fa-plus-square"></i> {!! trans('messages.t_origem_lesao') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'PARTE_CORPO')
                                            <li><a href="{!! asset('dm/parte_corpo') !!}"> <i class="fa fa-medkit"></i> {!! trans('messages.t_parte_corpo') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'TIPO_LESAO')
                                            <li><a href="{!! asset('dm/tipo_lesao') !!}"> <i class="fa fa-plus-square"></i> {!! trans('messages.t_tipo_lesao') !!}</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can( 'acesso', array( 'TIPO_CONTAS', 'CONTAS' ) )
                        <li class="treeview">
                        <a href="#">
                            <i class="fa fa-money"></i>
                            <span>{!! trans('messages.t_financeiro') !!}</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can( 'acesso', 'CONTAS')
                                <li><a href="{!! asset('financeiro/contas') !!}"> <i class="fa fa-money"></i> {!! trans('messages.t_contas') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'TIPO_CONTAS')
                                <li><a href="{!! asset('financeiro/tipocontas') !!}"> <i class="fa fa-sitemap"></i> {!! trans('messages.t_tipoconta') !!}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can( 'acesso'
                        , array ( 'CONDICAO_TEMPO'
                            , 'CONDICAO_GRAMADO'
                            , 'ESTADIO'
                            , 'ESCOPO'
                            , 'JUIZ'
                            , 'MOTIVO_CARTAO'
                            , 'PONTUACAO'
                            , 'TECNICOS'
                            , 'TIME'
                            , 'TIPO_FASE'
                            , 'TIPO_CAMPEONATO'
                            )
                        )
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>{!! trans('messages.t_jogos') !!}</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                @can( 'acesso', 'CAMPEONATOS')
                                    <li><a href="{!! asset('jogos/campeonatos') !!}"> <i class="fa fa-user-md"></i> {!! trans('messages.t_campeonatos') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'ESTADIO')
                                    <li><a href="{!! asset('jogos/estadios') !!}"> <i class="glyphicon glyphicon-map-marker"></i> {!! trans('messages.t_estadios') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'JUIZ')
                                    <li><a href="{!! asset('jogos/juizes') !!}"> <i class="glyphicon glyphicon-flag"></i> {!! trans('messages.t_juizes') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'TIME')
                                    <li><a href="{!! asset('jogos/times') !!}"> <i class="fa fa-shield"></i> {!! trans('messages.t_times') !!}</a></li>
                                @endcan
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-tag"></i> {!! trans('messages.cadastros') !!}
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        @can( 'acesso', 'CONDICAO_GRAMADO')
                                            <li><a href="{!! asset('jogos/condicaogramado') !!}"> <i class="fa fa-asterisk"></i> {!! trans('messages.t_condicaogramado') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'CONDICAO_TEMPO')
                                            <li><a href="{!! asset('jogos/condicaotempo') !!}"><i class="fa fa-umbrella" aria-hidden="true"></i> {!! trans('messages.t_condicaotempo') !!}</a></li>
                                        @endcan
                                            @can( 'acesso', 'CRITERIOS')
                                                <li><a href="{!! asset('jogos/criterios') !!}"><i class="fa fa-umbrella" aria-hidden="true"></i> {!! trans('messages.t_criterios') !!}</a></li>
                                            @endcan
                                        @can( 'acesso', 'ESCOPO')
                                            <li><a href="{!! asset('jogos/escopos') !!}"> <i class="fa fa-bullseye"></i> {!! trans('messages.t_escopo') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'MOTIVO_CARTAO')
                                            <li><a href="{!! asset('jogos/motivocartao') !!}"> <i class="fa fa-bullseye"></i> {!! trans('messages.t_motivocartao') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'TIPO_FASE')
                                            <li><a href="{!! asset('jogos/tipofase') !!}"> <i class="fa fa-code-fork"></i> {!! trans('messages.t_tipofase') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'PONTUACAO')
                                            <li><a href="{!! asset('pontuacao') !!}"> <i class="fa fa-sort-numeric-asc"></i> {!! trans('messages.t_pontuacao') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'TECNICOS')
                                            <li><a href="{!! asset('jogos/tecnicos') !!}"> <i class="glyphicon glyphicon-paste"></i> {!! trans('messages.t_tecnicos') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'TIPO_CAMPEONATO')
                                            <li><a href="{!! asset('jogos/tipocampeonato') !!}"> <i class="fa fa-trophy"></i> {!! trans('messages.t_tipocampeonato') !!}</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can( 'acesso', array( 'TIPO_ACAO', 'MARKETING_EVENTO' ) )
                        <li class="treeview">
                        <a href="#">
                            <i class="fa fa-line-chart"></i>
                            <span>{!! trans('messages.t_marketing') !!}</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can( 'acesso', 'CONTAS')
                                <li><a href="{!! asset('tipoacao') !!}"> <i class="fa fa-tag"></i> {!! trans('messages.t_tipoacao') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'MARKETING_EVENTO')
                                <li><a href="{!! asset('marketingevento') !!}"> <i class="fa fa-calendar-check-o"></i> {!! trans('messages.t_marketingevento') !!}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan

                    @can( 'acesso', array( 'ATIVIDADES_NUTRICAO'
                    , 'ORIGEM_NUTRICAO'
                    , 'SUPLEMENTOS'
                    , 'CONTROLE_SUPLEMENTOS'
                    , 'ATENDIMENTO_NUTRICAO' ) )
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cutlery"></i>
                                <span>{!! trans('messages.t_nutricao') !!}</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                @can( 'acesso', 'ATENDIMENTO_NUTRICAO')
                                    <li><a href="{!! asset('nutricao/atendimentoNutricao') !!}"> <i class="fa fa-calendar"></i> {!! trans('messages.t_atendimentoNutricao') !!}</a></li>
                                @endcan
                                    @can( 'acesso', 'CONTROLE_SUPLEMENTOS')
                                        <li><a href="{!! asset('nutricao/controlesuplemento') !!}"> <i class="fa fa-calendar"></i> {!! trans('messages.t_controlesuplemento') !!}</a></li>
                                    @endcan
                                    <li class="treeview">
                                        <a href="#"><i class="fa fa-tag"></i> {!! trans('messages.cadastros') !!}
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                        @can( 'acesso', 'ATIVIDADES_NUTRICAO')
                                            <li><a href="{!! asset('nutricao/atividadesNutricao') !!}"> <i class="fa fa-cutlery"></i> {!! trans('messages.t_atividadenutricao') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'ORIGEM_NUTRICAO')
                                            <li><a href="{!! asset('nutricao/origemNutricao') !!}"> <i class="fa fa-retweet"></i> {!! trans('messages.t_origemnutricao') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'SUPLEMENTOS')
                                            <li><a href="{!! asset('nutricao/suplementos') !!}"> <i class="fa fa-plus-circle"></i> {!! trans('messages.t_suplementos') !!}</a></li>
                                        @endcan
                                        </ul>
                                    </li>
                            </ul>
                        </li>
                    @endcan
                    @can( 'acesso', array( 'ATENDIMENTO_PEDAGOGIA', 'ATIVIDADES_PEDAGOGICAS', 'ORIGEM_PEDAGOGIA' ) )
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-mortar-board"></i>
                                <span>{!! trans('messages.t_pedagogia') !!}</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @can( 'acesso', 'ATENDIMENTO_PEDAGOGIA')
                                    <li>
                                        <a href="{!! asset('pedagogia/atendimentosped') !!}">
                                            <i class="fa fa-calendar"></i> {!! trans('messages.t_atendimentoped') !!}
                                        </a>
                                    </li>
                                @endcan
                                    <li class="treeview">
                                        <a href="#"><i class="fa fa-tag"></i> {!! trans('messages.cadastros') !!}
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            @can( 'acesso', 'ATIVIDADES_PEDAGOGICAS')
                                                <li><a href="{!! asset('pedagogia/atividadesped') !!}"> <i class="fa fa-calendar"></i> {!! trans('messages.t_atividadepedagogicas') !!}</a></li>
                                            @endcan
                                            @can( 'acesso', 'ORIGEM_PEDAGOGIA')
                                                <li><a href="{!! asset('pedagogia/origemped') !!}"> <i class="fa fa-calendar"></i> {!! trans('messages.t_origempedagogia') !!}</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                            </ul>
                        </li>
                    @endcan
                    @can( 'acesso', array( 'PSICOLOGIA', 'PSICOLOGIA_FUNC', 'PSICOLOGIA_GRUPOS', 'ATIVIDADES_PSICOLOGIA', 'ORIGEM_PSICOLOGIA' ) )
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-comment-o"></i>
                                <span>{!! trans('messages.t_psicologia') !!}</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @can( 'acesso', 'PSICOLOGIA')
                                    <li>
                                        <a href="{!! asset('psicologia/atendimentopsic') !!}">
                                            <i class="fa fa-calendar"></i> {!! trans('messages.t_atendimentopsic') !!}
                                        </a>
                                    </li>
                                @endcan
                                @can( 'acesso', 'PSICOLOGIA_FUNC')
                                    <li>
                                        <a href="{!! asset('psicologia/atendimentopsic_func') !!}">
                                            <i class="glyphicon glyphicon-user"></i> {!! trans('messages.t_atendimentopsic_func') !!}
                                        </a>
                                    </li>
                                @endcan
                                @can( 'acesso', 'PSICOLOGIA_GRUPOS')
                                    <li><a href="{!! asset('psicologia/atendimentopsic_grupo') !!}"> <i class="fa fa-users"></i> {!! trans('messages.t_atendimentopsic_grupo') !!}</a></li>
                                @endcan
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-tag"></i> {!! trans('messages.cadastros') !!}
                                        <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        @can( 'acesso', 'ATIVIDADES_PSICOLOGIA')
                                            <li><a href="{!! asset('psicologia/atividades') !!}"> <i class="fa fa-bullhorn"></i> {!! trans('messages.t_atividadepsicologia') !!}</a></li>
                                        @endcan
                                        @can( 'acesso', 'ORIGEM_PSICOLOGIA')
                                            <li><a href="{!! asset('psicologia/origem') !!}"> <i class="fa fa-share-square"></i> {!! trans('messages.t_origempsicologia') !!}</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can( 'acesso', array( 'ATENDIMENTO_SS'
                        , 'ATENDIMENTO_SS_FUNC'
                        , 'ATENDIMENTOS_SS_GRUPOS'
                        , 'AUSENCIA_ESCOLAR'
                        , 'CURSOS_EXTRAS'
                        , 'HISTORICO_ESCOLAR_SS'
                        , 'EVENTOS'
                        , 'ATIVIDADES_SERVICO_SOCIAL'
                        , 'ORIGEM_SERVSOCIAL'
                        , 'MOTIVO_AUSENCIA_ESCOLAR') )
                        <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-pushpin"></i>
                            <span>{!! trans('messages.t_servicosocial') !!}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#"><i class="fa fa-calendar"></i> {!! trans('messages.atendimentos') !!}
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>
                                <ul class="treeview-menu">
                                    @can( 'acesso', 'ATENDIMENTO_SS')
                                        <li><a href="{!! asset('ssocial/atendimentoSS') !!}"> <i class="fa fa-calendar"></i> {!! trans('messages.t_atendimentoSS') !!}</a></li>
                                    @endcan
                                    @can( 'acesso', 'ATENDIMENTO_SS_FUNC')
                                        <li><a href="{!! asset('ssocial/atendimentoSS_func') !!}"> <i class="glyphicon glyphicon-user"></i> {!! trans('messages.t_atendimentoSS_func') !!}</a></li>
                                    @endcan
                                    @can( 'acesso', 'ATENDIMENTOS_SS_GRUPOS')
                                        <li><a href="{!! asset('ssocial/atendimentoSS_grupos') !!}"> <i class="fa fa-users"></i> {!! trans('messages.t_atendimentoSS_grupos') !!}</a></li>
                                    @endcan
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#"><i class="fa fa-graduation-cap"></i> {!! trans('messages.escolas') !!}
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>
                                <ul class="treeview-menu">
                                    @can( 'acesso', 'HISTORICO_ESCOLAR_SS')
                                        <li><a href="{!! asset('ssocial/historicoescolar') !!}"> <i class="fa fa-signal"></i> {!! trans('messages.t_historicoescolar') !!}</a></li>
                                    @endcan
                                    @can( 'acesso', 'AUSENCIA_ESCOLAR')
                                        <li><a href="{!! asset('ssocial/ausenciaescolar') !!}"> <i class="fa fa-calendar-times-o"></i> {!! trans('messages.t_ausenciaescolar') !!}</a></li>
                                    @endcan
                                </ul>
                            </li>
                            @can( 'acesso', 'CURSOS_EXTRAS')
                                <li><a href="{!! asset('ssocial/cursosextras') !!}"> <i class="fa fa-gamepad"></i> {!! trans('messages.t_cursosextras') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'EVENTOS')
                                <li><a href="{!! asset('ssocial/eventos') !!}"> <i class="glyphicon glyphicon-ice-lolly-tasted"></i> {!! trans('messages.t_eventos') !!}</a></li>
                            @endcan

                            <li class="treeview">
                                <a href="#"><i class="fa fa-tag"></i> {!! trans('messages.cadastros') !!}
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>
                                <ul class="treeview-menu">
                                    @can( 'acesso', 'ATIVIDADES_SERVICO_SOCIAL')
                                        <li><a href="{!! asset('ssocial/atividadesSS') !!}"> <i class="fa fa-bullhorn"></i> {!! trans('messages.t_atividadeSS') !!}</a></li>
                                    @endcan
                                    @can( 'acesso', 'MOTIVO_AUSENCIA_ESCOLAR')
                                        <li><a href="{!! asset('ssocial/motivoAusenciaEscolar') !!}"> <i class="fa fa-tag"></i> {!! trans('messages.t_motivoAusencia') !!}</a></li>
                                    @endcan
                                    @can( 'acesso', 'ORIGEM_SERVSOCIAL')
                                        <li><a href="{!! asset('ssocial/origemservsocial') !!}"> <i class="fa fa-tag"></i> {!! trans('messages.t_origemservsocial') !!}</a></li>
                                    @endcan
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endcan
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.0.1 beta
            </div>
            <strong>Copyright &copy; 2016-2017 <a href="http://ocigla.com.br">Ocigla</a>.</strong> Todos os direitos reservados.
        </footer>
    </div>
    <script>
        function mudaCategoria(id_categoria, descricao) {
            var _url = '{{asset("config/altera_categoria")}}/' + id_categoria;
            //alert(_url);
            $.ajax({
                url: _url,
                type: 'GET',
                dataType: 'html',
                encode: true,
                data: {id: id_categoria, _token: $("#_tokenSearch").val()},
                success: function (data) {
                    $("#_categoria").html('');
                    $("#_categoria").append(data);
                    window.location.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    </script>

</body>

</html>
