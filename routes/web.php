<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('home');
});

Route::get('mail', function()
{
    dd(Config::get('mail'));
});

Route::group(['prefix'=>'teste', 'middleware' => 'auth'], function() {
    Route::get(''               , ['as' => 'teste'          , 'uses' => 'TesteController@index']);
    Route::get ('teste_json'    , ['as' => 'teste_json'     , 'uses' => 'TesteController@teste_json']);
    Route::get ('teste_editor'  , ['as' => 'teste_editor'   , 'uses' => 'TesteController@teste_editor']);
    Route::get ('create'        , ['as' => 'teste.create'   , 'uses' => 'TesteController@create']);
    Route::post('store'         , ['as' => 'teste.store'    , 'uses' => 'TesteController@store' ]);
    Route::get ('edit/{id}'     , ['as' => 'teste.edit'     , 'uses' => 'TesteController@edit']);
    Route::put ('update/{id}'   , ['as' => 'teste.update'   , 'uses' => 'TesteController@update' ]);
    Route::get ('destroy/{id}'  , ['as' => 'teste.destroy'  , 'uses' => 'TesteController@destroy']);
});

Route::group(['prefix'=>'jogadorfoto', 'middleware' => 'auth'], function() {
    Route::get ('foto/{id}'     , ['as' => 'jogadorfoto.foto'    , 'uses' => 'JogadorFotoController@foto']);
});

/*
Route::group(['prefix'=>'jogadorOcorrencias', 'middleware' => 'auth'], function() {
    Route::get(''               , ['as' => 'jogadorOcorrencias'         , 'uses' => 'ocorrenciasController@index']);
    Route::get ('_json'         , ['as' => 'jogadorOcorrencias._json'   , 'uses' => 'ocorrenciasController@_json']);
    Route::get ('create'        , ['as' => 'jogadorOcorrencias.create'  , 'uses' => 'ocorrenciasController@create']);
    Route::post('store'         , ['as' => 'jogadorOcorrencias.store'   , 'uses' => 'ocorrenciasController@store' ]);
    Route::get ('edit/{id}'     , ['as' => 'jogadorOcorrencias.edit'    , 'uses' => 'ocorrenciasController@edit']);
    Route::put ('update/{id}'   , ['as' => 'jogadorOcorrencias.update'  , 'uses' => 'ocorrenciasController@update' ]);
    Route::get ('destroy/{id}'  , ['as' => 'jogadorOcorrencias.destroy' , 'uses' => 'ocorrenciasController@destroy']);
});
*/

/*
Route::group(['prefix'=>'jogadoresObservacao', 'middleware' => 'auth'], function() {
    Route::get(''               , ['as' => 'jogadoresObservacao'         , 'uses' => 'jogadoresObservacaoController@index']);
    Route::get ('_json'         , ['as' => 'jogadoresObservacao._json'   , 'uses' => 'jogadoresObservacaoController@_json']);
    Route::get ('create'        , ['as' => 'jogadoresObservacao.create'  , 'uses' => 'jogadoresObservacaoController@create']);
    Route::post('store'         , ['as' => 'jogadoresObservacao.store'   , 'uses' => 'jogadoresObservacaoController@store' ]);
    Route::get ('edit/{id}'     , ['as' => 'jogadoresObservacao.edit'    , 'uses' => 'jogadoresObservacaoController@edit']);
    Route::put ('update/{id}'   , ['as' => 'jogadoresObservacao.update'  , 'uses' => 'jogadoresObservacaoController@update' ]);
    Route::get ('destroy/{id}'  , ['as' => 'jogadoresObservacao.destroy' , 'uses' => 'jogadoresObservacaoController@destroy']);
});
*/

Route::group(['prefix'=>'quadroatividades', 'middleware' => 'auth'], function() {
    Route::get ('/{data}'       , ['as' => 'quadroatividades'         , 'uses' => 'quadroatividadesController@index'  ]);
    Route::get ('create'        , ['as' => 'quadroatividades.create'  , 'uses' => 'quadroatividadesController@create' ]);
    Route::post('store'         , ['as' => 'quadroatividades.store'   , 'uses' => 'quadroatividadesController@store'  ]);
    Route::get ('edit/{id}'     , ['as' => 'quadroatividades.edit'    , 'uses' => 'quadroatividadesController@edit'   ]);
    Route::put ('update/{id}'   , ['as' => 'quadroatividades.update'  , 'uses' => 'quadroatividadesController@update' ]);
    Route::get ('destroy/{id}'  , ['as' => 'quadroatividades.destroy' , 'uses' => 'quadroatividadesController@destroy']);
});


// Administrativo
Route::group(['prefix'=>'adm', 'middleware' => 'auth'], function() {
    Route::resource('alojamentos', 'adm\AlojamentosController'      , ['except' => 'show']);
    Route::resource('afastamentos', 'adm\afastamentosController'    , ['except' => 'show']);
    Route::resource('atividadesAdm', 'adm\atividadesAdmController'  , ['except' => 'show']);
    Route::resource('cargos', 'adm\CargosController'                , ['except' => 'show']);
    Route::resource('cidades', 'adm\CidadesController'              , ['except' => 'show']);
    Route::resource('departamentos', 'adm\DepartamentosController'  , ['except' => 'show']);
    Route::resource('escolaridades', 'adm\escolaridadesController'  , ['except' => 'show']);
    Route::resource('estadocivil', 'adm\estadocivilController'      , ['except' => 'show']);
    Route::resource('funcionarios', 'adm\FuncionariosController'    , ['except' => 'show']);
    Route::resource('motivoAusencia', 'adm\motivoAusenciaController', ['except' => 'show']);
    Route::resource('motivoafastamento', 'adm\motivoafastamentoController', ['except' => 'show']);
    Route::resource('ocorrencias', 'adm\ocorrenciasController'      , ['except' => 'show']);
    Route::resource('paises'       , 'adm\PaisesController'         , ['except' => 'show']);
});

Route::group(['prefix'=>'contratos', 'middleware' => 'auth'], function() {
    Route::resource('tipocontrato', 'contratos\tipoContratoController', ['except' => 'show']);
});

Route::group(['prefix'=>'pedagogia', 'middleware' => 'auth'], function() {
    Route::resource('atendimentosped'   , 'pedagogia\atendimentospedController' , ['except' => 'show']);
    Route::resource('atividadesped'     , 'pedagogia\atividadespedController'   , ['except' => 'show']);
    Route::resource('origemped'         , 'pedagogia\origempedController'       , ['except' => 'show']);
});

// Nutrição
Route::group(['prefix'=>'nutricao', 'middleware' => 'auth'], function() {
    Route::resource('atendimentoNutricao', 'nutricao\atendimentoNutricaoController', ['except' => 'show']);
    Route::resource('atividadesNutricao', 'nutricao\atividadesNutricaoController', ['except' => 'show']);
    Route::resource('controlesuplemento', 'nutricao\controlesuplementosController', ['except' => 'show']);
    Route::resource('origemNutricao', 'nutricao\origemNutricaoController', ['except' => 'show']);
    Route::resource('suplementos', 'nutricao\suplementosController'               , ['except' => 'show']);
});

// Psicologia
Route::group(['prefix'=>'psicologia', 'middleware' => 'auth'], function() {
    Route::resource('atividades'            , 'psicologia\atividadesController'         , ['except' => 'show']);
    Route::resource('origem'                , 'psicologia\origemController'             , ['except' => 'show']);
    Route::resource('atendimentopsic'       , 'psicologia\atendimentopsicController'    , ['except' => 'show']  );
    Route::resource('atendimentopsic_func'  , 'psicologia\atendimentopsicFuncController',  ['except' => 'show']  );
    Route::resource('atendimentopsic_grupo' , 'psicologia\atendimentopsicGrupoController', ['except' => 'show']  );
});

// Serviço social
Route::group(['prefix'=>'ssocial', 'middleware' => 'auth'], function() {
    Route::resource('atendimentoSS_grupos'  , 'ssocial\AtendimentoSSGrupoController'    , ['except' => 'show']  );
    Route::resource('origemservsocial'      , 'ssocial\origemservsocialController'      , ['except' => 'show']  );
    Route::resource('atendimentoSS'         , 'ssocial\atendimentoSSController'         , ['except' => 'show']  );
    Route::resource('atendimentoSS_func'    , 'ssocial\atendimentoSSfuncController'     , ['except' => 'show']  );
    Route::resource('atividadesSS'          , 'ssocial\atividadesSSController'          , ['except' => 'show']  );
    Route::resource('eventos'               , 'ssocial\eventosController'               , ['except' => 'show']  );
    Route::resource('eventosJogadores'      , 'ssocial\eventosJogadoresController'      , ['except' => 'show']  );
    Route::resource('motivoAusenciaEscolar' , 'ssocial\motivoAusenciaEscolarController' , ['except' => 'show']  );
    Route::resource('historicoescolar'      , 'ssocial\historicoEscolarController'      , ['except' => 'show']  );
    Route::resource('cursosextras'          , 'ssocial\CursosExtrasController'          , ['except' => 'show']  );
    Route::resource('ausenciaescolar'       , 'ssocial\ausenciaescolarController'       , ['except' => 'show']  );

    Route::get ('eventosJogadores/inclusao'     , ['as' => 'eventosJogadores.inclusao'               , 'uses' => 'ssocial\eventosJogadoresController@inclusao']);
    Route::get ('eventosJogadores/exclusao/{id}', ['as' => 'eventosJogadores.exclusao'               , 'uses' => 'ssocial\eventosJogadoresController@exclusao']);
});

// DM
Route::group(['prefix'=>'dm', 'middleware' => 'auth'], function() {
    Route::resource('cirurgias'   , 'dm\CirurgiasController'   , ['except' => 'show']);
    Route::resource('cuidados'    , 'dm\CuidadosController'    , ['except' => 'show']);
    Route::resource('exames'      , 'dm\ExamesController'      , ['except' => 'show']);
    Route::resource('origem_lesao', 'dm\Origem_LesaoController', ['except' => 'show']);
    Route::resource('parte_corpo' , 'dm\Parte_CorpoController' , ['except' => 'show']);
    Route::resource('tipo_lesao'  , 'dm\Tipo_LesaoController'  , ['except' => 'show']);
    Route::resource('depmedico'   , 'dm\DepMedicoController'   , ['except' => 'show']);

    Route::resource('dmacompanha' , 'dm\DmAcompanhaController' , ['except' => 'show']);
    Route::resource('dmcirurgias' , 'dm\dmCirurgiasController' , ['except' => 'show']);
    Route::resource('dmexames'    , 'dm\dmExamesController'    , ['except' => 'show']);
    Route::resource('prontuario'  , 'dm\ProntuarioController'  , ['except' => 'show']);
});

Route::group(['prefix'=>'DFutebol', 'middleware' => 'auth'], function() {
    Route::resource('categorias'   , 'DFutebol\CategoriasController'        , ['except' => 'show']);
    Route::resource('janelas'      , 'DFutebol\JanelasController'           , ['except' => 'show']);
    Route::resource('localatividade', 'DFutebol\LocalAtividadeController'   , ['except' => 'show']);
    Route::resource('parceiros'    , 'DFutebol\ParceirosController'         , ['except' => 'show']);
    Route::resource('pedominante'  , 'DFutebol\PeDominanteController'       , ['except' => 'show']);
    Route::resource('posicoes'     , 'DFutebol\PosicoesController'          , ['except' => 'show']);
    Route::resource('selecoes'     , 'DFutebol\SelecoesController'          , ['except' => 'show']);
    Route::resource('jogadores'    , 'DFutebol\JogadoresController'         , ['except' => 'show']);

    Route::get ('jogadores/foto/{id}'     , ['as' => 'jogadores.foto'        ,'uses' => 'DFutebol\JogadoresController@foto']);
    Route::get('jogadores/autocomplete'   , ['as' => 'jogadores.autocomplete','uses' => 'DFutebol\JogadoresController@autocomplete']);
});

Route::group(['prefix'=>'jogos', 'middleware' => 'auth'], function() {
    Route::resource('campeonatos'       , 'jogos\campeonatosController'       , ['except' => 'show']);
    Route::resource('condicaogramado'   , 'jogos\condicaoGramadoController'   , ['except' => 'show']);
    Route::resource('condicaotempo'     , 'jogos\condicaoTempoController'     , ['except' => 'show']);
    Route::resource('criterios'         , 'jogos\criteriosController'         , ['except' => 'show']);
    Route::resource('estadios'          , 'jogos\estadiosController'          , ['except' => 'show']);
    Route::resource('escopos'           , 'jogos\escoposController'           , ['except' => 'show']);
    Route::resource('juizes'            , 'jogos\juizesController'            , ['except' => 'show']);
    Route::resource('motivocartao'      , 'jogos\motivocartaoController'      , ['except' => 'show']);
    Route::resource('pontuacao'         , 'jogos\pontuacaoController'         , ['except' => 'show']);
    Route::resource('times'             , 'jogos\TimesController'             , ['except' => 'show']);
    Route::resource('tipocampeonato'    , 'jogos\TipoCampeonatoController'    , ['except' => 'show']);
    Route::resource('tipofase'          , 'jogos\tipoFaseController'          , ['except' => 'show']);
    Route::resource('tecnicos'          , 'jogos\tecnicosController'          , ['except' => 'show']);
});

Route::group(['prefix'=>'financeiro', 'middleware' => 'auth'], function() {
    Route::resource('contas'                        , 'financeiro\contasController'     , ['except' => 'show']);
    Route::resource('tipocontas'                    , 'financeiro\tipoContasController' , ['except' => 'show']);
});


Route::group(['middleware' => 'auth'], function(){
    Route::resource('marketing'                     , 'MarketingEventoController'           , ['except' => 'show']);
    Route::resource('marketingevento'               , 'MarketingEventoController'           , ['except' => 'show']);
    Route::resource('projetos'                      , 'ProjetosController'                  , ['except' => 'show']);
    Route::resource('tipoacao'                      , 'TipoAcaoController'                  , ['except' => 'show']);
});

Route::get('/viewpdf', 'PdfviewController@index');

// config
Route::get('config/altera_categoria/{id}', ['as' => 'config.altera_categoria', 'uses' => 'ConfigController@altera_categoria']);

Route::get('marketing/_json'                , 'MarketingEventoController@_json');
Route::get('marketingevento/_json'          , 'MarketingEventoController@_json');
Route::get('projetos/_json'                 , 'ProjetosController@_json');
Route::get('tipoacao/_json'                 , 'TipoAcaoController@_json');
Route::get('tipocampeonato/_json'           , 'TipoCampeonatoController@_json');
//Route::get('tipofase/_json'                 , 'TipoFaseController@_json');


Route::get('test', function() {
    Auth::loginUsingId(1);
    print (Auth::user()->name);
});

Auth::routes();
Route::get('/home', 'HomeController@index');

//Route::get ('login', 'AuthController@showLoginForm');
//Route::post('login', 'AuthController@postLogin');


