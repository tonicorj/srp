<?php

namespace SRP\Http\Controllers;

use Illuminate\Http\Request;

use SRP\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;

use SRP\QuadroAtividades;
use SRP\Atividades;
use Session;

class quadroAtividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $data - é a data inicial do quadro de atividadesped
     * @return \Illuminate\Http\Response
     */
    public function index( $data )
    {
        // define hoje como a data
        //if (not( is_valid_date($data)))
        //    $data = date('Ymd');

        // pega a categoria da session, se não encontrar, coloca 1 - profissional
        if (Session::get('id_usuario'))
            $id_categoria = Session::get('id_usuario');
        else {
            Session::put('id_usuario', 1 );
            $id_categoria = Session::get('id_usuario');
        }

        //return dd($data);
        if ($data == "0")
            $data = date('Ymd');

        // definir a categoria atual
        $categoria = 1;

        // define o dia da semana
        $dia_semana = date('w', strtotime($data));

        // transforma em data o parametro
        $data_inicio = date( 'Y-m-d', strtotime($data));

        // muda o dia para 2a feira
        if ( $dia_semana == 2 ) // terça
            $data_inicio = date( 'Y-m-d', strtotime("-1 days " . $data_inicio));
        if ( $dia_semana == 3 ) // quarta
            $data_inicio = date( 'Y-m-d', strtotime("-2 days " . $data_inicio));
        if ( $dia_semana == 4 ) // quinta
            $data_inicio = date( 'Y-m-d', strtotime("-3 days " . $data_inicio));
        if ( $dia_semana == 5 ) // sexta
            $data_inicio = date( 'Y-m-d', strtotime("-4 days " . $data_inicio));
        if ( $dia_semana == 6 ) // sábado
            $data_inicio = date( 'Y-m-d', strtotime("-5 days " . $data_inicio));
        if ( $dia_semana == 0 ) // domingo
            $data_inicio = date( 'Y-m-d', strtotime("-6 days " . $data_inicio));

        // calcula + 6 dias
        $data_final  = date( 'Y-m-d',  strtotime("+6 days " . $data_inicio ));
        $dia = [
            'segunda' => data_display($data_inicio),
            'terca'   => data_display(date( 'Y-m-d', strtotime("+1 day " . $data_inicio ))),
            'quarta'  => data_display(date( 'Y-m-d', strtotime("+2 days ". $data_inicio ))),
            'quinta'  => data_display(date( 'Y-m-d', strtotime("+3 days ". $data_inicio ))),
            'sexta'   => data_display(date( 'Y-m-d', strtotime("+4 days ". $data_inicio ))),
            'sabado'  => data_display(date( 'Y-m-d', strtotime("+5 days ". $data_inicio ))),
            'domingo' => data_display(date( 'Y-m-d', strtotime("+6 days ". $data_inicio ))),
        ];

        // transforma as datas em sql
        $data_inicio = data_to_sql($data_inicio);
        $data_final  = data_to_sql($data_final);

        // testa se tem registros nesta semana
        $_sql  = "count(*) as qtd ";
        $registros = DB::table('QUADRO_ATIVIDADES')
                        ->select(DB::raw($_sql))
                        ->where('ID_CATEGORIA', '=', $categoria)
                        ->where('QUADRO_ATIVIDADE_DATA', '=', $data_inicio)
                        ->get();
        //return dd($registros);

        if ($registros[0]->qtd == 0) {
            for ( $i = 0; $i<7; $i++) {
                // define a data
                if ($i==0) $data = $dia['segunda'];
                if ($i==1) $data = $dia['terca'];
                if ($i==2) $data = $dia['quarta'];
                if ($i==3) $data = $dia['quinta'];
                if ($i==4) $data = $dia['sexta'];
                if ($i==5) $data = $dia['sabado'];
                if ($i==6) $data = $dia['domingo'];

                DB::table('QUADRO_ATIVIDADES')->insert([
                    ['ID_CATEGORIA' => $categoria, 'QUADRO_ATIVIDADE_DATA' => data_to_sql($data), 'QUADRO_ATIVIDADE_POSICAO' => 1]
                ]);

                DB::table('QUADRO_ATIVIDADES')->insert([
                    ['ID_CATEGORIA' => $categoria, 'QUADRO_ATIVIDADE_DATA' => data_to_sql($data), 'QUADRO_ATIVIDADE_POSICAO' => 2]
                ]);

                DB::table('QUADRO_ATIVIDADES')->insert([
                    ['ID_CATEGORIA' => $categoria, 'QUADRO_ATIVIDADE_DATA' => data_to_sql($data), 'QUADRO_ATIVIDADE_POSICAO' => 3]
                ]);

                //$_sql  = " INSERT INTO QUADRO_ATIVIDADES ( ID_CATEGORIA, QUADRO_ATIVIDADE_DATA, QUADRO_ATIVIDADE_POSICAO )";
                //$_sql .= " values ( " . $categoria . ",'" . data_to_sql($data) . "', 1 )";
            }
        }

        // exclusão
        $_sql = "DELETE TEMP_QTS " .
            " WHERE ID_CATEGORIA = " . $id_categoria .
            " AND QUADRO_ATIVIDADE_DATA >= '" . $data_inicio . "'" .
            " AND QUADRO_ATIVIDADE_DATA <= '" . $data_final  . "'";
        DB::delete($_sql);

        // pega as atividadesped   //  "CONVERT( DATETIME, '20170424')" )
        $_sql = "EXEC P_QUADRO_ATIVIDADES " .
            $id_categoria . "," .
            "'" . $data_inicio . "'," .
            "'" . $data_final  . "'";

        DB::statement($_sql);

        $atividades = DB::table('TEMP_QTS')
            ->where('QUADRO_ATIVIDADE_DATA', '>=',$data_inicio)
            ->where('QUADRO_ATIVIDADE_DATA', '<=', $data_final)
            ->where('ID_CATEGORIA', '=', $id_categoria)
            ->get();

        // pega as observações
        $observacoes = DB::table('QUADRO_ATIVIDADES')
            ->where('QUADRO_ATIVIDADE_DATA', '=', $data_inicio )
            ->get();

        //return dd($observacoes);
        //return data_display($data_inicio);
        $periodo = data_display($data_inicio) . ' - ' . data_display($data_final);

        return view('quadroatividades.index')
            ->with('atividades' , $atividades)
            ->with('observacoes', $observacoes)
            ->with('periodo'    , $periodo )
            ->with('dia'        , $dia )
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // pega a atividade
        $qatividade = QuadroAtividades::find($id);

        // campos para exibição
        $qatividade->DATA  = data_display($qatividade->QUADRO_ATIVIDADE_DATA);

        // define o turno
        if ($qatividade->QUADRO_ATIVIDADE_POSICAO == 1)
            $qatividade->TURNO = trans('messages.tit_turno_manha');
        if ($qatividade->QUADRO_ATIVIDADE_POSICAO == 2)
            $qatividade->TURNO = trans('messages.tit_turno_tarde');
        if ($qatividade->QUADRO_ATIVIDADE_POSICAO == 3)
            $qatividade->TURNO = trans('messages.tit_turno_noite');

        // lista as atividadesped
        $ativ = Atividades::orderBy('ATIVIDADE_DESCRICAO', 'asc')->pluck('ATIVIDADE_DESCRICAO', 'ID_ATIVIDADE');

        return view('quadroatividades.edit')
            ->with('qatividade' , $qatividade)
            ->with('ativ'       , $ativ )
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return dd($request);
        $q = QuadroAtividades::find($id);
        $q->update($request->all());

        return Redirect::to('quadroatividades/' . date( 'Ymd', $q['DATA']) );

        return view('quadroatividades')
        ->with('data', date( 'Ymd', $q['DATA']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
