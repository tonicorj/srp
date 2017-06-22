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
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        {!!Html::style("https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css") !!}        <!-- Ionicons -->
        {!!Html::style("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css")!!} <!-- Font Awesome -->

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
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <div class="nav navbar-nav navbar-right navbar-btn">
                        <!-- Authentication Links -->
                        <a href="{{ url('/logout') }}" class="btn-sm btn-danger"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
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
                        <p>{{ Auth::user()->name }}</p>
                        <p>{{ $categoria_atual }}</p>
                        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        <p>
                            <a href="{{ url('/logout') }}" class="btn-xs btn-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa text-success"></i> Logout</a>
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </p>
                        -->
                    </div>
                </div>
                <!-- search form -->

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">{!! trans('messages.t_menu_principal') !!}</li>
                    @can( 'acesso'
                    , array( 'JOGADORES'
                        , 'ATIVIDADES'
                        , 'CIDADES'
                        , 'ESCOLARIDADES'
                        , 'ESTADOCIVIL'
                        , 'JANELAS'
                        , 'LOCAL_ATIVIDADE'
                        , 'PAISES'
                        , 'PARCEIROS'
                        , 'PE_DOMINANTE'
                        , 'SELECAO'
                        , 'QUADRO_ATIVIDADES'
                        , 'CATEGORIA'
                        ) )
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>{!! trans('messages.t_dep_futebol') !!}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can( 'acesso', 'QUADRO_ATIVIDADES')
                            <li><a href="{!! asset('quadroatividades') .'/'. 0 !!}"><i class="fa fa-circle-o"></i> {!! trans('messages.t_quadroatividades') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'JOGADORES')
                            <li><a href="{!! asset('jogadores') !!}"><i class="fa fa-circle-o"></i> {!! trans('messages.t_jogadores') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'ATIVIDADES')
                            <li><a href="{!! asset('adm\atividades') !!}">      <i class="fa fa-circle-o"></i> {!! trans('messages.t_atividade') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'CATEGORIA')
                               <li><a href="{!! asset('DFutebol\categorias') !!}">           <i class="fa fa-circle-o"></i> {!! trans('messages.t_categoria') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'CIDADES')
                                <li><a href="{!! asset('DFutebol\cidades') !!}">           <i class="fa fa-circle-o"></i> {!! trans('messages.t_cidades') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'ESCOLARIDADES')
                            <li><a href="{!! asset('escolaridades') !!}">   <i class="fa fa-circle-o"></i> {!! trans('messages.t_escolaridades') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'ESTADOCIVIL')
                            <li><a href="{!! asset('estadocivil') !!}">     <i class="fa fa-circle-o"></i> {!! trans('messages.t_estadocivil') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'JANELAS')
                            <li><a href="{!! asset('janelas') !!}">         <i class="fa fa-circle-o"></i> {!! trans('messages.t_janelas') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'LOCAL_ATIVIDADE')
                            <li><a href="{!! asset('localatividade') !!}">  <i class="fa fa-circle-o"></i> {!! trans('messages.t_localatividade') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'PAISES')
                            <li><a href="{!! asset('DFutebol\paises') !!}">          <i class="fa fa-circle-o"></i> {!! trans('messages.t_paises') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'PARCEIROS')
                            <li><a href="{!! asset('parceiros') !!}">       <i class="fa fa-circle-o"></i> {!! trans('messages.t_parceiros') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'PE_DOMINANTE')
                            <li><a href="{!! asset('pedominante') !!}">       <i class="fa fa-circle-o"></i> {!! trans('messages.t_pedominante') !!}</a></li>
                            @endcan

                            <li>Cadastros
                            <ul class="treeview-menu">
                                @can( 'acesso', 'SELECAO')
                                <li><a href="{!! asset('selecoes') !!}">       <i class="fa fa-circle-o"></i> {!! trans('messages.t_selecao') !!}</a></li>
                                @endcan
                            </ul>
                            </li>
                        </ul>
                    </li>
                    @endcan

                    @can( 'acesso', array( 'FUNCIONARIOS', 'MOTIVO DE AUSENCIA',  'CARGOS', 'TIPO CONTRATO', 'OCORRENCIAS_JOGADORES', 'PROJETOS', 'ALOJAMENTOS' ) )
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>{!! trans('messages.t_administrativo') !!}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can( 'acesso', 'ALOJAMENTOS')
                                <li><a href="{!! asset('adm') !!}">     <i class="fa fa-circle-o"></i> {!! trans('messages.t_alojamento') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'FUNCIONARIOS')
                                <li><a href="{!! asset('adm/funcionarios') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_funcionarios') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'DEPARTAMENTOS')
                                <li><a href="{!! asset('adm/departamentos') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_departamento') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'MOTIVO DE AUSENCIA')
                            <li><a href="{!! asset('motivo_ausencia') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_motivo_ausencia') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'CARGOS')
                            <li><a href="{!! asset('adm/cargos') !!}">          <i class="fa fa-circle-o"></i> {!! trans('messages.t_cargo') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'TIPO CONTRATO')
                            <li><a href="{!! asset('tipo_contrato') !!}">   <i class="fa fa-circle-o"></i> {!! trans('messages.t_tipo_contrato') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'OCORRENCIAS_JOGADORES')
                            <li><a href="{!! asset('adm/ocorrencias') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_ocorrencias_jog') !!}</a></li>
                            @endcan

                            @can( 'acesso', 'PROJETOS')
                            <li><a href="{!! asset('projetos') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_projeto') !!}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can( 'acesso', array( 'JOGADORES EM OBSERVACAO' ) )
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>{!! trans('messages.t_observacao') !!}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can( 'acesso', 'JOGADORES EM OBSERVACAO')
                            <li><a href="{!! asset('jogadoresObservacao') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_jogobservacao') !!}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can( 'acesso', array( 'CIRURGIAS', 'EXAMES', 'ORIGEM_LESAO', 'PARTE_CORPO', 'TIPO_LESAO') )
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                <span>{!! trans('messages.tit_depmedico') !!}</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                @can( 'acesso', 'REGISTRO_DM')
                                    <li><a href="{!! asset('DM/depmedico') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_dep_medico') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'CIRURGIAS')
                                    <li><a href="{!! asset('DM/cirurgias') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_cirurgias') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'EXAMES')
                                <li><a href="{!! asset('DM/exames') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_exames') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'ORIGEM_LESAO')
                                <li><a href="{!! asset('DM/origem_lesao') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_origem_lesao') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'PARTE_CORPO')
                                <li><a href="{!! asset('DM/parte_corpo') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_parte_corpo') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'TIPO_LESAO')
                                <li><a href="{!! asset('DM/tipo_lesao') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_tipo_lesao') !!}</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can( 'acesso', array( 'TIPO_CONTAS', 'CONTAS' ) )
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>{!! trans('messages.t_financeiro') !!}</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can( 'acesso', 'CONTAS')
                                <li><a href="{!! asset('financeiro/contas') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_contas') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'TIPO_CONTAS')
                                <li><a href="{!! asset('financeiro/tipocontas') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_tipoconta') !!}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can( 'acesso', array( 'CONDICAO_TEMPO', 'CONDICAO_GRAMADO', 'ESCOPO', 'PONTUACAO', 'TECNICOS', 'TIPO_FASE', 'TIPO_CAMPEONATO' ) )
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                <span>{!! trans('messages.t_jogos') !!}</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                @can( 'acesso', 'CONDICAO_GRAMADO')
                                    <li><a href="{!! asset('jogos/condicaogramado') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_condicaogramado') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'CONDICAO_TEMPO')
                                    <li><a href="{!! asset('jogos/condicaotempo') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_condicaotempo') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'ESCOPO')
                                    <li><a href="{!! asset('jogos/escopos') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_escopo') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'TIPO_FASE')
                                    <li><a href="{!! asset('tipofase') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_tipofase') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'PONTUACAO')
                                    <li><a href="{!! asset('pontuacoes') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_pontuacao') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'TECNICOS')
                                    <li><a href="{!! asset('tecnicos') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_tecnicos') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'TIPO_CAMPEONATO')
                                    <li><a href="{!! asset('tipocampeonato') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_tipocampeonato') !!}</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can( 'acesso', array( 'TIPO_ACAO', 'MARKETING_EVENTO' ) )
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>{!! trans('messages.t_marketing') !!}</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can( 'acesso', 'CONTAS')
                                <li><a href="{!! asset('tipoacao') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_tipoacao') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'MARKETING_EVENTO')
                                <li><a href="{!! asset('marketingevento') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_marketingevento') !!}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan

                    @can( 'acesso', array( 'ATIVIDADES_NUTRICAO', 'ORIGEM_NUTRICAO', 'SUPLEMENTOS', 'ATENDIMENTO_NUTRICAO' ) )
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                <span>{!! trans('messages.t_nutricao') !!}</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                @can( 'acesso', 'ATENDIMENTO_NUTRICAO')
                                    <li><a href="{!! asset('nutricao/atendimentoNutricao') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_atendimentoNutricao') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'ATIVIDADES_NUTRICAO')
                                    <li><a href="{!! asset('nutricao/atividadesNutricao') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_atividadenutricao') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'ORIGEM_NUTRICAO')
                                    <li><a href="{!! asset('nutricao/origemNutricao') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_origemnutricao') !!}</a></li>
                                @endcan
                                @can( 'acesso', 'SUPLEMENTOS')
                                <li><a href="{!! asset('nutricao/suplementos') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_suplementos') !!}</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can( 'acesso', array( 'ATIVIDADES_PEDAGOGICAS' ) )
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>{!! trans('messages.t_pedagogia') !!}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can( 'acesso', 'ATIVIDADES_PEDAGOGICAS')
                                <li><a href="{!! asset('pedagogia/atividadesped') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_atividadepedagogicas') !!}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can( 'acesso', array( 'PSICOLOGIA', 'PSICOLOGIA_FUNC', 'PSICOLOGIA_GRUPOS', 'ATIVIDADES_PSICOLOGIA', 'ORIGEM_PSICOLOGIA' ) )
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>{!! trans('messages.t_psicologia') !!}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can( 'acesso', 'PSICOLOGIA')
                                <li><a href="{!! asset('psicologia/atendimentopsic') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_atendimentopsic') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'PSICOLOGIA_FUNC')
                                <li><a href="{!! asset('psicologia/atendimentopsic_func') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_atendimentopsic_func') !!}</a></li>
                            @endcan

                                @can( 'acesso', 'PSICOLOGIA_GRUPOS')
                                    <li><a href="{!! asset('psicologia/atendimentopsic_grupo') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_atendimentopsic_grupo') !!}</a></li>
                                @endcan
                            @can( 'acesso', 'ATIVIDADES_PSICOLOGIA')
                                <li><a href="{!! asset('psicologia/atividades') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_atividadepsicologia') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'ORIGEM_PSICOLOGIA')
                                <li><a href="{!! asset('psicologia/origem') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_origempsicologia') !!}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can( 'acesso', array( 'ATENDIMENTO_SS'
                        , 'ATENDIMENTO_SS_FUNC'
                        , 'ATENDIMENTOS_GRUPOS'
                        , 'AUSENCIA_ESCOLAR'
                        , 'CURSOS_EXTRAS'
                        , 'HISTORICO_ESCOLAR_SS'
                        , 'EVENTOS'
                        , 'ATIVIDADES_SERVICO_SOCIAL'
                        , 'ORIGEM_SERVSOCIAL'
                        , 'MOTIVO_AUSENCIA_ESCOLAR') )
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>{!! trans('messages.t_servicosocial') !!}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can( 'acesso', 'ATENDIMENTO_SS')
                                <li><a href="{!! asset('SSocial/atendimentoSS') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_atendimentoSS') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'ATENDIMENTO_SS_FUNC')
                                <li><a href="{!! asset('SSocial/atendimentoSS_func') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_atendimentoSS_func') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'ATENDIMENTOS_GRUPOS')
                                <li><a href="{!! asset('SSocial/atendimentoSS_grupos') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_atendimentoSS_grupos') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'CURSOS_EXTRAS')
                                <li><a href="{!! asset('SSocial/cursosextras') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_cursosextras') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'HISTORICO_ESCOLAR_SS')
                                    <li><a href="{!! asset('SSocial/historicoescolar') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_historicoescolar') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'AUSENCIA_ESCOLAR')
                                <li><a href="{!! asset('SSocial/ausenciaescolar') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_ausenciaescolar') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'EVENTOS')
                                    <li><a href="{!! asset('SSocial/eventos') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_eventos') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'ATIVIDADES_SERVICO_SOCIAL')
                                <li><a href="{!! asset('SSocial/atividadesSS') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_atividadeSS') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'MOTIVO_AUSENCIA_ESCOLAR')
                                <li><a href="{!! asset('SSocial/motivoAusenciaEscolar') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_motivo_ausencia') !!}</a></li>
                            @endcan
                            @can( 'acesso', 'ORIGEM_SERVSOCIAL')
                                <li><a href="{!! asset('SSocial/origemservsocial') !!}"> <i class="fa fa-circle-o"></i> {!! trans('messages.t_origemservsocial') !!}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">

            <section class="content">
                <!-- Content Header (Page header) -->
                @if(Session::has('message'))
                    {!! Alert::success(Session::get('message')) !!}
                @endif

                @yield('content')
                <!--
                <section class="content-header">
                </section>
                -->
            </section>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.0.1 beta
            </div>
            <strong>Copyright &copy; 2016 <a href="http://ocigla.com.br">Ocigla</a>.</strong> Todos os direitos reservados.
        </footer>
    </div>
</body>

</html>
