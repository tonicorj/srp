<?php
function AcaoCodigo($nome){

    $codigo = 0;
    $nome = strtoupper($nome);

    switch ($nome) {
        case 'JOGADORES'                                : $codigo = 1;      break;
        case 'PAISES'                                   : $codigo = 2;      break;

        case 'CIDADES'                                  : $codigo = 4;      break;
        case 'CATEGORIA'                                : $codigo = 5;      break;

        case 'LOCAL_ATIVIDADE'                          : $codigo = 12;     break;
        case 'ATIVIDADES'                               : $codigo = 13;     break;

        case 'TIPO_CAMPEONATO'                          : $codigo = 17;     break;
        case 'ESCOPO'                                   : $codigo = 18;     break;
        case 'TIPO_LESAO'                               : $codigo = 19;     break;
        case 'PARTE_CORPO'                              : $codigo = 20;     break;
        case 'REGISTRO_DM'                              : $codigo = 21;     break;

        case 'FUNCIONARIOS'                             : $codigo = 22;     break;
        case 'EXAMES'                                   : $codigo = 23;     break;
        case 'PARCEIROS'                                : $codigo = 24;     break;
        case 'QUADRO_ATIVIDADES'                        : $codigo = 25;     break;

        case 'TECNICOS'                                 : $codigo = 33;     break;
        case 'CONDICAO_GRAMADO'                         : $codigo = 34;     break;

        case 'OCORRENCIAS_JOGADORES'                    : $codigo = 58;     break;

        case 'SELECAO'                                  : $codigo = 76;     break;
        case 'TIPO_CONTAS'                              : $codigo = 77;     break;
        case 'CONTAS'                                   : $codigo = 78;     break;

        case 'PSICOLOGIA'                               : $codigo = 81;     break;

        case 'MOTIVO_AUSENCIA'                          : $codigo = 93;     break;

        case 'POSICAO'                                  : $codigo = 102;    break;

        case 'CARGOS'                                   : $codigo = 114;    break;

        case 'TIPO_CONTRATO'                            : $codigo = 123;    break;
        case 'JOGADORES_EM_OBSERVACAO'                  : $codigo = 124;    break;

        case 'DEPARTAMENTOS'                            : $codigo = 148;    break;

        case 'ATIVIDADES_SERVICO_SOCIAL'                : $codigo = 151;    break;
        case 'ATIVIDADES_PEDAGOGICAS'                   : $codigo = 152;    break;
        case 'CURSOS_EXTRAS'                            : $codigo = 153;    break;

        case 'HISTORICO_ESCOLAR_SS'                     : $codigo = 164;    break;

        case 'ATENDIMENTO_SS'                           : $codigo = 167;    break;

        case 'CIRURGIAS'                                : $codigo = 169;    break;

        case 'ALOJAMENTOS'                              : $codigo = 258;    break;
        case 'CONDICAO_TEMPO'                           : $codigo = 259;    break;
        case 'PSICOLOGIA_GRUPOS'                        : $codigo = 260;    break;

        case 'ATENDIMENTOS_GRUPOS'                      : $codigo = 262;    break;

        case 'SUPLEMENTOS'                              : $codigo = 263;    break;
        case 'ATENDIMENTO_NUTRICAO'                     : $codigo = 264;    break;

        case 'ORIGEM_SERVSOCIAL'                        : $codigo = 287;    break;
        case 'JANELAS'                                  : $codigo = 288;    break;
        case 'ATIVIDADES_PSICOLOGIA'                    : $codigo = 290;    break;
        case 'ORIGEM_PSICOLOGIA'                        : $codigo = 291;    break;

        case 'ATIVIDADES_NUTRICAO'                      : $codigo = 296;    break;
        case 'ORIGEM_NUTRICAO'                          : $codigo = 297;    break;

        case 'PSICOLOGIA_FUNC'                          : $codigo = 300;    break;
        case 'ATENDIMENTO_SS_FUNC'                      : $codigo = 301;    break;

        case 'TIPO_ACAO'                                : $codigo = 305;    break;
        case 'MARKETING_EVENTO'                         : $codigo = 306;    break;

        case 'EVENTOS'                                  : $codigo = 319;    break;

        case 'AUSENCIA_ESCOLAR'                         : $codigo = 321;    break;

        case 'MOTIVO_AUSENCIA_ESCOLAR'                  : $codigo = 334;    break;

        case "ESCOLARIDADES"                            : $codigo = 400;    break;
        case "ESTADOCIVIL"                              : $codigo = 401;    break;
        case "ORIGEM_LESAO"                             : $codigo = 402;    break;
        case "PE_DOMINANTE"                             : $codigo = 403;    break;
        case "PONTUACAO"                                : $codigo = 404;    break;
        case "TIPO_FASE"                                : $codigo = 405;    break;
    }

    //C:\inetpub\wwwroot\srp\resources\views\marketingevento\OLD_index.blade.php
    // retorna o n�mero das telas
    //$codigo = ( $nome == 'JOGADORES')?1:$codigo;
    $codigo = ( $nome == 'ELENCO'                                   )?3:$codigo;
    $codigo = ( $nome == 'EQUIPE'                                   )?6:$codigo;
    $codigo = ( $nome == 'EST�DIO'                                  )?7:$codigo;
    $codigo = ( $nome == 'CONTRATOS'                                )?8:$codigo;
    $codigo = ( $nome == 'CAMPEONATO'                               )?9:$codigo;
    $codigo = ( $nome == 'TEMPORADA'                                )?10:$codigo;
    $codigo = ( $nome == 'CAMPEONATOS'                              )?11:$codigo;

    $codigo = ( $nome == 'TREINAMENTOS'                             )?14:$codigo;
    $codigo = ( $nome == 'REL.FUNCIONALIDADES'                      )?15:$codigo;
    $codigo = ( $nome == 'MOTIVO DE CART�O'                         )?16:$codigo;

    $codigo = ( $nome == 'CLASSIFICA��O JOGADORES'                  )?26:$codigo;
    $codigo = ( $nome == 'CLASSIFICA��O JOGADOR/CONTROLE'           )?27:$codigo;
    $codigo = ( $nome == 'DI�RIO'                                   )?28:$codigo;
    $codigo = ( $nome == 'MENSAL'                                   )?29:$codigo;
    $codigo = ( $nome == 'JOGOS POR JOGADOR'                        )?30:$codigo;
    $codigo = ( $nome == 'CONTROLE PEDAG�GICO'                      )?31:$codigo;
    $codigo = ( $nome == 'TRIAGEM DM'                               )?32:$codigo;

    $codigo = ( $nome == 'JOGADORES EM TESTE'                       )?35:$codigo;
    $codigo = ( $nome == 'PONTUA��O JOGADOR'                        )?36:$codigo;
    $codigo = ( $nome == 'CONVOCA��ES JOGADOR'                      )?37:$codigo;
    $codigo = ( $nome == 'PR�MIOS JOGADOR'                          )?38:$codigo;
    $codigo = ( $nome == 'ANTROPOMETRIA'                            )?39:$codigo;
    $codigo = ( $nome == 'LIMIAR'                                   )?40:$codigo;
    $codigo = ( $nome == 'TESTES(PENEIRA)'                          )?41:$codigo;
    $codigo = ( $nome == 'CATEGORIAS POR USU�RIO'                   )?42:$codigo;
    $codigo = ( $nome == 'SAIR'                                     )?43:$codigo;
    $codigo = ( $nome == 'SELE��O DE CATEGORIA'                     )?44:$codigo;
    $codigo = ( $nome == 'GRUPO'                                    )?45:$codigo;
    $codigo = ( $nome == 'SITUA��O GERAL CONTRATOS'                 )?46:$codigo;
    $codigo = ( $nome == 'LOCAL DE NASCIMENTO'                      )?47:$codigo;
    $codigo = ( $nome == 'AVALIA��O JOGADORES'                      )?48:$codigo;
    $codigo = ( $nome == 'AVALIA��O'                                )?49:$codigo;
    $codigo = ( $nome == 'DETALHADO DE ATIVIDADES'                  )?50:$codigo;
    $codigo = ( $nome == 'MENSAL DE ATIVIDADES'                     )?51:$codigo;
    $codigo = ( $nome == 'JOGADORES SEM CONTRATO'                   )?52:$codigo;
    $codigo = ( $nome == 'FICHA JOGADOR'                            )?54:$codigo;
    $codigo = ( $nome == 'INDICA��ES PARCEIRO'                      )?55:$codigo;
    $codigo = ( $nome == 'ELENCO POR CATEGORIA'                     )?56:$codigo;
    $codigo = ( $nome == '% DIR.ECON�MICOS - POR DONO'              )?57:$codigo;

    $codigo = ( $nome == 'ENTRADAS'                                 )?59:$codigo;
    $codigo = ( $nome == 'TOTAL POR TIPO/ORIGEM/PARTE DO CORPO'     )?60:$codigo;
    $codigo = ( $nome == 'DE POR JOGADOR'                           )?61:$codigo;
    $codigo = ( $nome == 'DE POR DONO'                              )?62:$codigo;
    $codigo = ( $nome == 'DF POR JOGADOR'                           )?63:$codigo;
    $codigo = ( $nome == 'DF POR DONO'                              )?64:$codigo;
    $codigo = ( $nome == 'POR JOGADOR'                              )?66:$codigo;
    $codigo = ( $nome == 'POR CATEGORIA'                            )?67:$codigo;
    $codigo = ( $nome == 'ESTAT�STICAS GOLS'                        )?68:$codigo;
    $codigo = ( $nome == 'CONFIGURA��O'                             )?69:$codigo;
    $codigo = ( $nome == 'USU�RIOS'                                 )?70:$codigo;
    $codigo = ( $nome == 'MATURA��O (GRUPO)'                        )?71:$codigo;
    $codigo = ( $nome == 'MATURA��O (INDIVIDUAL)'                   )?72:$codigo;
    $codigo = ( $nome == 'OCORR�NCIAS (INDIVIDUAL)'                 )?73:$codigo;
    $codigo = ( $nome == 'OCORR�NCIAS (GRUPO)'                      )?74:$codigo;
    $codigo = ( $nome == 'PEDAGOGIA/REL.ESCOLAS'                    )?75:$codigo;


    $codigo = ( $nome == 'LAN�AMENTO'                               )?79:$codigo;
    $codigo = ( $nome == 'FINANCEIRO'                               )?80:$codigo;

    $codigo = ( $nome == 'M�DICO/FISIOTERAPEUTA'                    )?82:$codigo;
    $codigo = ( $nome == 'PUNI��O'                                  )?83:$codigo;
    $codigo = ( $nome == 'ALTERA BASE DADOS'                        )?84:$codigo;
    $codigo = ( $nome == 'PERIMETRIA'                               )?85:$codigo;
    $codigo = ( $nome == 'COMPOSI��O CORPORAL'                      )?86:$codigo;
    $codigo = ( $nome == 'ESTATURA'                                 )?87:$codigo;
    $codigo = ( $nome == 'CAPACIDADE AER�BICA'                      )?88:$codigo;
    $codigo = ( $nome == 'PERFIL'                                   )?89:$codigo;
    $codigo = ( $nome == 'USU�RIOS'                                 )?90:$codigo;
    $codigo = ( $nome == 'REL.CONTRATOS'                            )?91:$codigo;
    $codigo = ( $nome == 'GASTOS'                                   )?92:$codigo;

    $codigo = ( $nome == 'TIPO DE TREINO'                           )?94:$codigo;
    $codigo = ( $nome == 'AN�LISE INDIVIDUAL'                       )?95:$codigo;
    $codigo = ( $nome == 'RESIST�NCIA INTERMITENTE'                 )?96:$codigo;
    $codigo = ( $nome == 'RESIST�NCIA CONTINUA'                     )?97:$codigo;
    $codigo = ( $nome == 'YOYO'                                     )?98:$codigo;
    $codigo = ( $nome == '�RBITROS'                                 )?99:$codigo;
    $codigo = ( $nome == 'CATEGORIAS'                               )?100:$codigo;
    $codigo = ( $nome == 'REL.CONTAS'                               )?101:$codigo;
    $codigo = ( $nome == 'ATIVIDADES'                               )?103:$codigo;
    $codigo = ( $nome == 'REL.MOTIVO AUS�NCIA'                      )?104:$codigo;
    $codigo = ( $nome == 'REL.MOTIVO CART�O'                        )?105:$codigo;
    $codigo = ( $nome == 'TREINO'                                   )?106:$codigo;
    $codigo = ( $nome == 'FUNCIONALIDADES'                          )?107:$codigo;
    $codigo = ( $nome == 'ATIVIDADE'                                )?108:$codigo;
    $codigo = ( $nome == 'REL.EXAMES'                               )?109:$codigo;
    $codigo = ( $nome == 'TIPO DE LES�O'                            )?110:$codigo;
    $codigo = ( $nome == 'REL.PARTE DO CORPO'                       )?111:$codigo;
    $codigo = ( $nome == 'TROCA SENHA'                              )?112:$codigo;
    $codigo = ( $nome == 'VIAGENS/CONVOCA��ES'                      )?113:$codigo;

    $codigo = ( $nome == 'ANTROPOMETRIA'                            )?115:$codigo;
    $codigo = ( $nome == 'CALEND�RIO DE JOGOS'                      )?116:$codigo;
    $codigo = ( $nome == 'MOTIVO DE MUDAN�A'                        )?117:$codigo;
    $codigo = ( $nome == 'CRIT�RIO DE AVALIA��O'                    )?119:$codigo;
    $codigo = ( $nome == 'CLASSIFICA��ES'                           )?120:$codigo;
    $codigo = ( $nome == 'ESCALA��ES'                               )?121:$codigo;
    $codigo = ( $nome == 'EXIBIR MAIS INFORMA��ES'                  )?122:$codigo;

    $codigo = ( $nome == 'PERGUNTAS'                                )?125:$codigo;
    $codigo = ( $nome == 'QUESTION�RIO'                             )?126:$codigo;
    $codigo = ( $nome == 'CARACTER�STICAS'                          )?128:$codigo;
    $codigo = ( $nome == 'PR�XIMOS AUMENTOS'                        )?129:$codigo;
    $codigo = ( $nome == 'REL.TIPO DE CONTA'                        )?130:$codigo;
    $codigo = ( $nome == 'CART�ES'                                  )?131:$codigo;
    $codigo = ( $nome == 'JOGOS X JOGADORES'                        )?132:$codigo;
    $codigo = ( $nome == 'AUMENTO POR PER�ODO'                      )?133:$codigo;
    $codigo = ( $nome == 'CLASSIFICA��ES AVALIA��O'                 )?134:$codigo;
    $codigo = ( $nome == 'CART�ES ADVERS�RIO'                       )?135:$codigo;
    $codigo = ( $nome == 'JOGOS X JOGADOR ADVERS�RIO'               )?136:$codigo;
    $codigo = ( $nome == 'REL.MINUTOS X JOGADORES'                  )?137:$codigo;
    $codigo = ( $nome == 'GR�FICO MINUTOS X JOGADORES ADVERS�RIO'   )?138:$codigo;
    $codigo = ( $nome == 'TRATAMENTOS FISIOTERAPIA'                 )?139:$codigo;
    $codigo = ( $nome == 'FISIOTERAPIA DI�RIO'                      )?140:$codigo;
    $codigo = ( $nome == 'SIMPLES'                                  )?143:$codigo;
    $codigo = ( $nome == 'REL.FISIOLOGIA/VARI�VEIS'                 )?146:$codigo;
    $codigo = ( $nome == 'REL.ACOMPANHAMENTOS FISIOLOGIA'           )?147:$codigo;
    $codigo = ( $nome == 'TIPO DE PROGRAMA'                         )?149:$codigo;
    //$codigo = ( $nome == 'ENTREVISTA'                             )?150:$codigo;

    $codigo = ( $nome == 'CURSOS EXTRAS JOGADOR'                    )?154:$codigo;
    $codigo = ( $nome == 'CONTROLE DE REFEI��ES'                    )?157:$codigo;
    $codigo = ( $nome == 'CONTROLE DE ALOJAMENTO E HOR�RIOS'        )?158:$codigo;
    $codigo = ( $nome == 'JOGADORES QUE SA�RAM'                     )?159:$codigo;
    $codigo = ( $nome == 'PASSAPORTES A VENCER/VENCIDOS'            )?160:$codigo;
    $codigo = ( $nome == 'JULGAMENTOS JOGADOR'                      )?161:$codigo;
    $codigo = ( $nome == 'JOGADOR DESCONTOS'                        )?162:$codigo;
    $codigo = ( $nome == 'N�VEIS DE SAL�RIO'                        )?163:$codigo;
    $codigo = ( $nome == 'ATIVIDADE PEDAG�GICA'                     )?165:$codigo;
    $codigo = ( $nome == 'ATIVIDADE ASSIST�NCIA SOCIAL'             )?166:$codigo;
    $codigo = ( $nome == 'FREQUENCIA PEDAGOGIA'                     )?168:$codigo;

    $codigo = ( $nome == 'PERFIL PSICOL�GICO GRUPO'                 )?170:$codigo;
    $codigo = ( $nome == 'CUIDADOS ESPECIAIS'                       )?172:$codigo;
    $codigo = ( $nome == 'MEDICAMENTOS UTILIZADOS'                  )?173:$codigo;
    $codigo = ( $nome == 'VIDA DO JOGADOR'                          )?174:$codigo;
    $codigo = ( $nome == 'IMPULS�O VERTICAL'                        )?175:$codigo;
    $codigo = ( $nome == 'ACELERA��O'                               )?176:$codigo;
    $codigo = ( $nome == 'VELOCIDADE'                               )?177:$codigo;
    $codigo = ( $nome == 'POSI��O NO CAMPO'                         )?178:$codigo;
    $codigo = ( $nome == 'FORMA��ES'                                )?179:$codigo;
    $codigo = ( $nome == 'VALORES DE VENDA'                         )?180:$codigo;
    $codigo = ( $nome == 'PER�ODOS DE VENDA'                        )?181:$codigo;
    $codigo = ( $nome == 'ANTROPOMETRIA IND'                        )?182:$codigo;
    $codigo = ( $nome == 'REL.FUNCION�RIOS'                         )?183:$codigo;
    $codigo = ( $nome == 'POR POSI��O/DOCUMENTOS'                   )?184:$codigo;
    $codigo = ( $nome == 'POR POSI��O/TELEFONES'                    )?185:$codigo;
    $codigo = ( $nome == 'FREQ.PEDAG�GICA POR DATA'                 )?186:$codigo;
    $codigo = ( $nome == 'FREQ.A.SOCIAL POR DATA'                   )?187:$codigo;
    $codigo = ( $nome == 'FREQ.PEDAG.POR ATLETA'                    )?188:$codigo;
    $codigo = ( $nome == 'FREQ.A.SOCIAL POR ATLETA'                 )?189:$codigo;
    $codigo = ( $nome == 'ARTILHARIA POR TEMPORADA'                 )?190:$codigo;
    $codigo = ( $nome == 'ARTILHARIA POR CAMPEONATO'                )?191:$codigo;
    $codigo = ( $nome == 'VALORES + AUMENTOS'                       )?192:$codigo;
    $codigo = ( $nome == 'ORIGEM DO JOGADOR'                        )?193:$codigo;
    $codigo = ( $nome == 'CONTROLE TELAS FISIOLOGIA'                )?194:$codigo;
    $codigo = ( $nome == 'NORMATIZA��O TELAS FISIOLOGIA'            )?195:$codigo;
    $codigo = ( $nome == 'RELAT�RIO LOG'                            )?196:$codigo;
    $codigo = ( $nome == 'REL.INF.INCOMPLETAS DE JOGADORES'         )?197:$codigo;
    $codigo = ( $nome == 'CAMPOS OBRIGAT�RIOS'                      )?198:$codigo;
    $codigo = ( $nome == 'OCORR�NCIAS CT'                           )?199:$codigo;
    $codigo = ( $nome == 'OCORR�NCIAS MATERIAIS'                    )?200:$codigo;
    $codigo = ( $nome == 'CONTROLE REFEI��ES'                       )?201:$codigo;
    $codigo = ( $nome == 'PROJETOS'                                 )?202:$codigo;
    $codigo = ( $nome == 'APROVA��O LAN�AMENTOS'                    )?203:$codigo;
    $codigo = ( $nome == 'JOGADORES QUE FALTARAM'                   )?204:$codigo;
    $codigo = ( $nome == 'LOG'                                      )?205:$codigo;
    $codigo = ( $nome == 'REL.INF.INCOMPLETAS DE JOGADORES'         )?206:$codigo;
    $codigo = ( $nome == 'REL.LAN�AMENTOS SEM NOTAS'                )?207:$codigo;
    $codigo = ( $nome == 'INF.JOGOS'                                )?208:$codigo;
    $codigo = ( $nome == 'CONTRATOS POR ANO NASC'                   )?209:$codigo;
    $codigo = ( $nome == 'VALORES + IMPOSTOS'                       )?210:$codigo;
    $codigo = ( $nome == 'CONTROLE PESO'                            )?211:$codigo;
    $codigo = ( $nome == 'CONTROLE CK'                              )?212:$codigo;
    $codigo = ( $nome == 'ESCALA'                                   )?213:$codigo;
    $codigo = ( $nome == 'TRANSPORTE'                               )?214:$codigo;
    $codigo = ( $nome == 'DISTRIBUI��O NO CAMPO'                    )?215:$codigo;
    $codigo = ( $nome == 'REL.CUIDADOS ESPECIAIS'                   )?216:$codigo;
    $codigo = ( $nome == 'MEDICAMENTOS NO PER�ODO'                  )?217:$codigo;
    $codigo = ( $nome == 'DESCONTOS'                                )?218:$codigo;
    $codigo = ( $nome == 'GASTOS DETALHADOS'                        )?219:$codigo;
    $codigo = ( $nome == 'ANTROPOMETRIA (GRUPO)'                    )?220:$codigo;
    $codigo = ( $nome == 'MORFOFUNCIONAL'                           )?221:$codigo;
    $codigo = ( $nome == 'N�VEL DE SAL�RIO X ELENCO'                )?222:$codigo;
    $codigo = ( $nome == 'REL.QUESTION�RIO'                         )?225:$codigo;
    $codigo = ( $nome == 'CART�ES E JOGOS'                          )?226:$codigo;
    $codigo = ( $nome == 'AVALIA��ES JOGADORES'                     )?227:$codigo;
    $codigo = ( $nome == 'AVALIA��ES JOGADORES - PARAMETROS'        )?228:$codigo;
    $codigo = ( $nome == 'MINUTOS X JOGADORES'                      )?229:$codigo;
    $codigo = ( $nome == 'GASTOS NO M�S'                            )?234:$codigo;
    $codigo = ( $nome == 'GASTOS NO ANO'                            )?235:$codigo;
    $codigo = ( $nome == 'GASTOS X OR�AMENTO'                       )?236:$codigo;
    $codigo = ( $nome == 'LOGOF'                                    )?237:$codigo;
    $codigo = ( $nome == 'RECIBO DE PAGAMENTOS'                     )?238:$codigo;
    $codigo = ( $nome == 'UTILIZA��O DE UNIFORMES'                  )?239:$codigo;
    $codigo = ( $nome == 'REL.FUNCION�RIOS'                         )?240:$codigo;
    $codigo = ( $nome == 'CONTROLE DE EXAMES'                       )?241:$codigo;
    $codigo = ( $nome == 'LOG OFF'                                  )?242:$codigo;
    $codigo = ( $nome == 'ENTREVISTAS'                              )?243:$codigo;
    $codigo = ( $nome == 'USU�RIOS ATIVOS'                          )?244:$codigo;
    $codigo = ( $nome == 'CAMPOS OBRIGAT�RIOS'                      )?245:$codigo;
    $codigo = ( $nome == 'ENTREVISTAS FUNCION�RIOS'                 )?246:$codigo;
    $codigo = ( $nome == 'TAREFAS'                                  )?247:$codigo;
    $codigo = ( $nome == 'ROTINAS'                                  )?248:$codigo;
    $codigo = ( $nome == 'PROCESSOS'                                )?249:$codigo;
    $codigo = ( $nome == 'CONTROLE DE VAGAS'                        )?250:$codigo;
    $codigo = ( $nome == 'OCUPA��O DE VAGAS'                        )?251:$codigo;
    $codigo = ( $nome == 'OCUPA��O DE VAGAS MENSAL'                 )?252:$codigo;
    $codigo = ( $nome == 'OCORR�NCIAS ADMINISTRATIVAS'              )?253:$codigo;
    $codigo = ( $nome == 'OCORR�NCIAS DIVERSAS'                     )?254:$codigo;
    $codigo = ( $nome == 'OCORR�NCIAS ESTADIO'                      )?255:$codigo;
    $codigo = ( $nome == 'OCORR�NCIAS'                              )?256:$codigo;
    $codigo = ( $nome == 'SAL�RIOS'                                 )?257:$codigo;

    $codigo = ( $nome == 'FUNCION�RIOS - SAL�RIOS'                  )?261:$codigo;

    $codigo = ( $nome == 'ACOMPANHAMENTO NUTRICIONAL'               )?264:$codigo;
    $codigo = ( $nome == 'CONTROLE SUPLEMENTOS'                     )?265:$codigo;
    $codigo = ( $nome == 'CONTROLE DE CARD�PIOS'                    )?266:$codigo;
    $codigo = ( $nome == 'REL.ACOMPANHAMENTO NUTRICIONAL'           )?267:$codigo;
    $codigo = ( $nome == 'REL.CONTROLE SUPLEMENTOS'                 )?268:$codigo;
    $codigo = ( $nome == 'REL.CONTROLE DE CARD�PIOS'                )?269:$codigo;
    $codigo = ( $nome == 'REL.SUPLEMENTOS'                          )?270:$codigo;
    $codigo = ( $nome == 'OPTO JUMP'                                )?271:$codigo;
    $codigo = ( $nome == 'GOLS POR PER�ODO'                         )?272:$codigo;
    $codigo = ( $nome == 'JOGADORES QUE FALTARAM'                   )?273:$codigo;
    $codigo = ( $nome == 'TRATAMENTOS NO PER�ODO'                   )?274:$codigo;
    $codigo = ( $nome == 'TRATAMENTOS POR JOGADOR'                  )?275:$codigo;
    $codigo = ( $nome == 'JOGADORES NO PER�ODO'                     )?276:$codigo;
    $codigo = ( $nome == 'ACOMPANHAMENTOS NO PER�ODO'               )?277:$codigo;
    $codigo = ( $nome == 'ACOMPANHAMENTOS POR JOGADOR'              )?278:$codigo;
    $codigo = ( $nome == 'LAN�AMENTOS'                              )?279:$codigo;
    $codigo = ( $nome == 'LAN�AMENTOS'                              )?280:$codigo;
    $codigo = ( $nome == 'LAN�AMENTOS SEM NOTA'                     )?281:$codigo;
    $codigo = ( $nome == 'REL.GASTOS - DM'                          )?282:$codigo;
    $codigo = ( $nome == 'REL.GASTOS ANO - DM'                      )?283:$codigo;
    $codigo = ( $nome == 'REL.GASTOS M�S - DM'                      )?284:$codigo;
    $codigo = ( $nome == 'GASTOS OR�AMENTO'                         )?285:$codigo;

    $codigo = ( $nome == 'REL.ENTREVISTAS NO PER�ODO'               )?-3:$codigo;
    $codigo = ( $nome == 'REL.ENTREVISTAS DE JOGADORES'             )?-2:$codigo;
    $codigo = ( $nome == 'REL.ENTREVISTAS DE FUNCION�RIOS'          )?-1:$codigo;
    $codigo = ( $nome == 'OPTOJUMP (GRUPOS)'                        )?289:$codigo;

    return $codigo;
}

?>