<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;
use DB;

class JogadoresObservacao extends Model
{
    protected $table      = 'jogadores_em_observacao';
    protected $dateFormat = 'M j Y h:i:s:000A';
    protected $fillable   =
        ['ID_JOGADOR'
            ,'ID_TIME'
            ,'ID_PAIS'
            ,'ID_PARCEIRO'
            ,'ID_CIDADE_NATAL'
            ,'JOG_NOME_APELIDO'
            ,'JOG_NOME_COMPLETO'
            ,'JOG_DT_NASCIMENTO'
            ,'JOG_POSICAO'
            ,'JOG_CBF'
            ,'JOG_ALTURA'
            ,'JOG_PESO'
            ,'JOG_NUM_PE'
            ,'UF_NATAL'
            ,'CONTRATO_INICIAL'
            ,'CONTRATO_FINAL'
            //,'JOG_DATA_RESCISAO'
            ,'JOG_OBSERVACOES'
            ,'JOG_NUM_CONTRATO'
            ,'JOG_PE_PRINCIPAL'
            ,'JOG_CLASSIFICACAO'
            ,'ID_TIME_DIR_FEDERATIVO'
            ,'JOG_IMAGEM'
        ];

    protected $primaryKey = 'ID_JOGADOR';

    public $timestamps = false;

    public static $customMessages = array(
        'required'=> 'Digite o campo :attribute.',
        'between' => 'O :attribute deve ter no minimo :min digitos'
    );

    public static $rules = array(
         'JOG_NOME_APELIDO'     => 'required|min:3'
        ,'JOG_DT_NASCIMENTO'    => 'required'
    );

    public function paises() {
        return $this->hasOne('Paises', 'ID_PAIS');
    }

    public function categoria_id(){
        // pesquisa a categoria do jogador
        $reg = DB::table('elenco')
            ->where('id_jogador', $this->ID_JOGADOR)
            ->orderby('elenco_dt_chegada', 'desc')
            ->get();

        //return dd($reg);

        // senão achar a categoria, considera 1
        $categoria = $reg[0]->ID_CATEGORIA;

        return $categoria;
    }

    public function parceiro(){
        // pesquisa a categoria do jogador
        $reg = DB::table('parceiros')
            ->where('id_parceiro', $this->ID_PARCEIRO)
            ->get();
        $parceiro = $reg[0]->PARCEIRO_NOME;
        return $parceiro;
    }

    public function cidade(){
        // pesquisa a categoria do jogador
        $reg = DB::table('v_cidades')
            ->where('id_cidade', $this->ID_CIDADE_NATAL)
            ->get();
        $cidade = $reg[0]->cidade_nome;
        return $cidade;
    }
}
