{!! Form::hidden('ID_JOGADOR', null, ['class'=>'form-control', 'id'=>'ID_JOGADOR']) !!}

<div class="table">
    <div class="row">
        <div class="col-lg-7">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Dados do Jogador
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-8">
                            {!! Form::label('jog_nome_apelido', 'Apelido') !!}
                            {!! Form::text ('JOG_NOME_APELIDO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'60'
                                , 'id'=>'JOG_NOME_APELIDO'
                                , 'required'=>''
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::label('jog_dt_nascimento', 'Data de Nascimento') !!}
                            <div class="input-group date" id="_JOG_DT_NASCIMENTO">
                            {!! Form::text ('JOG_DT_NASCIMENTO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'10'
                                , 'id'=>'JOG_DT_NASCIMENTO'
                                , 'required'=>''
                                ]) !!}
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            {!! Form::label('jog_nome_completo', 'Nome Completo') !!}
                            {!! Form::text ('JOG_NOME_COMPLETO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'120'
                                , 'id'=>'JOG_NOME_COMPLETO'
                                , 'required'=>''
                                ]) !!}
                       </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            {!! Form::label('jog_posicao', 'Posição') !!}
                            {!! Form::text ('JOG_POSICAO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'8'
                                , 'id'=>'JOG_POSICAO'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::label('jog_pos_alternativa', 'Posição Alternativa') !!}
                            {!! Form::text ('JOG_POS_ALTERNATIVA', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'8'
                                , 'id'=>'JOG_POS_ALTERNATIVA'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::label('jog_pe_dominante', 'Pé Dominante') !!}
                            {!! Form::text ('JOG_PE_DOMINANTE', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'8'
                                , 'id'=>'JOG_PE_DOMINANTE'
                                ]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3">
                            {!! Form::label('jog_manequim', 'Manequim') !!}
                            {!! Form::text ('JOG_MANEQUIM', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'2'
                                , 'id'=>'JOG_MANEQUIM'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('jog_peso', 'Peso') !!}
                            {!! Form::text ('JOG_PESO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'3'
                                , 'id'=>'JOG_PESO'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('jog_num_pe', 'No.Pé') !!}
                            {!! Form::text ('JOG_NUM_PE', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'2'
                                , 'id'=>'JOG_NUM_PE'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('jog_peso', 'Peso') !!}
                            {!! Form::text ('JOG_PESO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'3'
                                , 'id'=>'JOG_PESO'
                                ]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                            {!! Form::label('ID_PAIS', 'País Natal') !!}
                            {!! Form::select('ID_PAIS', $paises, null, ['class'=>'form-control input-md']) !!}
                        </div>
                        <div class="form-group col-lg-7">
                            {!! Form::label  ('ID_CIDADE_NATAL', 'Cidade Natal') !!}
                            {!! Form::text   ('ID_CIDADE_NATAL', null, ['class'=>'form-control input-sm', 'id'=>'ID_CIDADE_NATAL']) !!}
                            {!! Form::text   ('CIDADE_NOME_NATAL', null, ['class'=>'form-control input-sm', 'id'=>'CIDADE_NOME_NATAL', 'maxlength' =>'50']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                            {!! Form::label('ID_ESCOLARIDADE', 'Escolaridade') !!}
                            {!! Form::select('ID_ESCOLARIDADE', $escolaridades, null, ['class'=>'form-control input-md']) !!}
                        </div>
                        <div class="form-group col-lg-2"></div>
                        <div class="form-group col-lg-5">
                            {!! Form::label('JOG_ESTADO_CIVIL', 'Estado Civil') !!}
                            {!! Form::select('ID_ESTADOCIVIL', $estadocivil, null, ['class'=>'form-control input-md']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Foto</div>
                        <div class="panel-body">
                            <center>
                                {!! Html::image($foto, '', array('class' => 'image','id'=>'blah', 'width'=>'120', 'height' => '120')) !!}
                                <br>
                                <label class="btn btn-primary" for="imgfoto">
                                    <input type='file' id="imgfoto" name="imgfoto" style='display:none;'/>
                                    Selecione uma Imagem
                                </label>
                                <!--<input type='file' id="imgFoto" style='display:none;'/>-->
                                <!--<input id="input6" name="input6" type="file" class="file-loading" data-allowed-file-extensions='["bmp", "png", "jpg"]'>-->
                            </center>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Entregas
                            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-lg-12 checkbox">
                                <label>
                                    {!! Form::checkbox('JOG_CARTEIRA_VACINA', null,
                                        ['class'=>'form-control'
                                        , 'id'=>'JOG_CARTEIRA_VACINA'
                                        ]) !!}
                                    Carteira de Vacinação
                                </label>
                            </div>
                            <div class="form-group col-lg-12 checkbox" >
                                <label>
                                    {!! Form::checkbox('JOG_AUTORIZACAO_ALOJAMENTO', null,
                                        ['class'=>'form-control'
                                        , 'id'=>'JOG_AUTORIZACAO_ALOJAMENTO'
                                        ]) !!}
                                    Autorização do Alojamento
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Registros
                            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                {!! Form::label('JOG_CBF', 'CBF') !!}
                                {!! Form::text ('JOG_CBF', null,
                                    ['class'=>'form-control'
                                    , 'maxlength' =>'8'
                                    , 'id'=>'JOG_CBF'
                                    ]) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::label('JOG_REG_ESTADUAL', 'Estadual') !!}
                                {!! Form::text ('JOG_REG_ESTADUAL', null,
                                    ['class'=>'form-control'
                                    , 'maxlength' =>'20'
                                    , 'id'=>'JOG_REG_ESTADUAL'
                                    ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-11">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Dados da Filiação
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-5">
                            {!! Form::label('jog_nome_pai', 'Nome do Pai') !!}
                            {!! Form::text ('JOG_NOME_PAI', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'100'
                                , 'id'=>'JOG_NOME_PAI'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-2">
                            {!! Form::label('jog_documento_pai', 'Documentos Pai') !!}
                            {!! Form::text ('JOG_DOCUMENTOS_PAI', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'100'
                                , 'id'=>'JOG_DOCUMENTOS_PAI'
                                ]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                            {!! Form::label('jog_nome_mae', 'Nome da Mãe') !!}
                            {!! Form::text ('JOG_NOME_MAE', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'100'
                                , 'id'=>'JOG_NOME_MAE'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-2">
                            {!! Form::label('jog_documento_mae', 'Documentos Mãe') !!}
                            {!! Form::text ('JOG_DOCUMENTOS_MAE', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'100'
                                , 'id'=>'JOG_DOCUMENTOS_MAE'
                                ]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-11">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Responsável Legal
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-5">
                            {!! Form::label('JOG_RESPONSAVEL_LEGAL', 'Nome') !!}
                            {!! Form::text ('JOG_RESPONSAVEL_LEGAL', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'120'
                                , 'id'=>'JOG_RESPONSAVEL_LEGAL'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-2 checkbox" >
                            <br>
                            <label>
                            {!! Form::checkbox('RESP_LEGAL_TUTOR', null,
                                ['class'=>'form-control'
                                , 'id'=>'RESP_LEGAL_TUTOR'
                                ]) !!}
                            Tutor
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-7">
                            {!! Form::label('JOG_CUIDADOR_ENDERECO', 'Endereço') !!}
                            {!! Form::text ('JOG_CUIDADOR_ENDERECO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'120'
                                , 'id'=>'JOG_CUIDADOR_ENDERECO'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_CUIDADOR_TELEFONE', 'Telefone') !!}
                            {!! Form::text ('JOG_CUIDADOR_TELEFONE', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'30'
                                , 'id'=>'JOG_CUIDADOR_TELEFONE'
                                ]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Informações da Web
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="form-group col-lg-5">
                        {!! Form::label('JOG_EMAIL', 'E-mail') !!}
                        {!! Form::text ('JOG_EMAIL', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'50'
                            , 'id'=>'JOG_EMAIL'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-5">
                        {!! Form::label('JOG_WWW', 'Home Page') !!}
                        {!! Form::text ('JOG_WWW', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'150'
                            , 'id'=>'JOG_WWW'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-5">
                        {!! Form::label('JOG_EMAIL', 'Twitter') !!}
                        {!! Form::text ('JOG_EMAIL', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'50'
                            , 'id'=>'JOG_EMAIL'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-5">
                        {!! Form::label('JOG_WWW', 'Facebook') !!}
                        {!! Form::text ('JOG_WWW', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'150'
                            , 'id'=>'JOG_WWW'
                            ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-11">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Documentos
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_IDENTIDADE', 'Identidade') !!}
                            {!! Form::text ('JOG_IDENTIDADE', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'40'
                                , 'id'=>'JOG_IDENTIDADE'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_IDENTIDADE_EMISSAO', 'Emissão') !!}
                            <div class="input-group date" id="_JOG_IDENTIDADE_EMISSAO">
                                {!! Form::text ('JOG_IDENTIDADE_EMISSAO', null,
                                    ['class'=>'form-control'
                                    , 'id'=>'JOG_IDENTIDADE_EMISSAO'
                                    ]) !!}
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_IDENTIDADE_VENCIMENTO', 'Vencimento') !!}
                            <div class="input-group date" id="_JOG_IDENTIDADE_VENCIMENTO">
                                {!! Form::text ('JOG_IDENTIDADE_VENCIMENTO', null,
                                    ['class'=>'form-control'
                                    , 'id'=>'JOG_IDENTIDADE_VENCIMENTO'
                                    ]) !!}
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_CPF', 'CPF') !!}
                            {!! Form::text ('JOG_CPF', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'40'
                                , 'id'=>'JOG_CPF'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_PIS', 'PIS') !!}
                            {!! Form::text ('JOG_PIS', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'40'
                                , 'id'=>'JOG_PIS'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_CARTEIRA_TRABALHO', 'Carteira de Trabalho') !!}
                            {!! Form::text ('JOG_CARTEIRA_TRABALHO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'40'
                                , 'id'=>'JOG_CARTEIRA_TRABALHO'
                                ]) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_CERTIFICADO_MILITAR', 'Certificado Militar') !!}
                            {!! Form::text ('JOG_CERTIFICADO_MILITAR', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'40'
                                , 'id'=>'JOG_CERTIFICADO_MILITAR'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_RA', 'RA(Pedagogia)') !!}
                            {!! Form::text ('JOG_RA', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'20'
                                , 'id'=>'JOG_RA'
                                ]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_TITULO_ELEITOR', 'Título de Eleitor') !!}
                            {!! Form::text ('JOG_TITULO_ELEITOR', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'40'
                                , 'id'=>'JOG_TITULO_ELEITOR'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-2">
                            {!! Form::label('JOG_ZONA', 'Zona') !!}
                            {!! Form::text ('JOG_ZONA', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'40'
                                , 'id'=>'JOG_ZONA'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-1">
                            {!! Form::label('JOG_SECAO', 'Seção') !!}
                            {!! Form::text ('JOG_SECAO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'40'
                                , 'id'=>'JOG_SECAO'
                                ]) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-3">
                            {!! Form::label('CERT_CARTORIO', 'Certidão Nascimento - Cartório') !!}
                            {!! Form::text ('CERT_CARTORIO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'40'
                                , 'id'=>'CERT_CARTORIO'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-2">
                            {!! Form::label('CERT_LIVRO', 'Livro') !!}
                            {!! Form::text ('CERT_LIVRO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'20'
                                , 'id'=>'CERT_LIVRO'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-2">
                            {!! Form::label('CERT_TERMO', 'Termo') !!}
                            {!! Form::text ('CERT_TERMO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'20'
                                , 'id'=>'CERT_TERMO'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-2">
                            {!! Form::label('CERT_FOLHA', 'Folha') !!}
                            {!! Form::text ('CERT_FOLHA', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'20'
                                , 'id'=>'CERT_FOLHA'
                                ]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_PASSAPORTE', 'Passaporte') !!}
                            {!! Form::text ('JOG_PASSAPORTE', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'100'
                                , 'id'=>'JOG_PASSAPORTE'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_PASSAPORTE_EMISSAO', 'Emissão') !!}
                            <div class="input-group date" id="_JOG_PASSAPORTE_EMISSAO">
                                {!! Form::text ('JOG_PASSAPORTE_EMISSAO', null,
                                    ['class'=>'form-control'
                                    , 'id'=>'JOG_PASSAPORTE_EMISSAO'
                                    ]) !!}
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_PASSAPORTE_VENCIMENTO', 'Vencimento') !!}
                            <div class="input-group date" id="_JOG_PASSAPORTE_VENCIMENTO">
                                {!! Form::text ('JOG_PASSAPORTE_VENCIMENTO', null,
                                    ['class'=>'form-control'
                                    , 'id'=>'JOG_PASSAPORTE_VENCIMENTO'
                                    ]) !!}
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_VISTO_NUMERO', 'Visto de Trabalho') !!}
                            {!! Form::text ('JOG_VISTO_NUMERO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'40'
                                , 'id'=>'JOG_VISTO_NUMERO'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('JOG_VISTO_VENCIMENTO', 'Vencimento') !!}
                            <div class="input-group date" id="_JOG_VISTO_VENCIMENTO">
                                {!! Form::text ('JOG_VISTO_VENCIMENTO', null,
                                    ['class'=>'form-control'
                                    , 'id'=>'JOG_VISTO_VENCIMENTO'
                                    ]) !!}
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Dados Bancários
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="form-group col-lg-4">
                        {!! Form::label('JOG_BANCO_NOME', 'Banco') !!}
                        {!! Form::text ('JOG_BANCO_NOME', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'50'
                            , 'id'=>'JOG_BANCO_NOME'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-2">
                        {!! Form::label('JOG_BANCO_AGENCIA', 'Agência') !!}
                        {!! Form::text ('JOG_BANCO_AGENCIA', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'50'
                            , 'id'=>'JOG_BANCO_AGENCIA'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('JOG_BANCO_CONTA', 'Conta') !!}
                        {!! Form::text ('JOG_BANCO_CONTA', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'50'
                            , 'id'=>'JOG_BANCO_CONTA'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('JOG_BANCO_TIPO_CONTA', 'Tipo de Conta') !!}
                        {!! Form::text ('JOG_BANCO_TIPO_CONTA', null,
                            ['class'=>'form-control'
                            , 'id'=>'JOG_BANCO_TIPO_CONTA'
                            ]) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Plano de Saúde
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-6" >
                            {!! Form::label('JOG_NOME_PLANO_SAUDE', 'Nome do Plano de Saúde') !!}
                            {!! Form::text ('JOG_NOME_PLANO_SAUDE', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'20'
                                , 'id'=>'JOG_NOME_PLANO_SAUDE'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-5" >
                            {!! Form::label('JOG_PLANO_SAUDE', 'Número do Cartão') !!}
                            {!! Form::text ('JOG_PLANO_SAUDE', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'20'
                                , 'id'=>'JOG_PLANO_SAUDE'
                                ]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-11">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Endereço 1
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="form-group col-lg-6">
                        {!! Form::label('JOG_ENDERECO', 'Endereço 1') !!}
                        {!! Form::text ('JOG_ENDERECO', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'200'
                            , 'id'=>'JOG_ENDERECO'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-5">
                        {!! Form::label('JOG_BAIRRO', 'Bairro') !!}
                        {!! Form::text ('JOG_BAIRRO', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'100'
                            , 'id'=>'JOG_BAIRRO'
                            ]) !!}
                    </div>

                    <div class="form-group col-lg-6">
                        {!! Form::label  ('ID_CIDADE', 'Cidade') !!}
                        {!! Form::hidden ('ID_CIDADE'   , null, ['class'=>'form-control input-sm', 'id'=>'ID_CIDADE']) !!}
                        {!! Form::text   ('CIDADE_NOME1', null, ['class'=>'form-control input-sm', 'id'=>'CIDADE_NOME1', 'maxlength' =>'50']) !!}
                    </div>
                    <div class="form-group col-lg-2">
                        {!! Form::label('UF', 'UF') !!}
                        {!! Form::text ('UF', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'10'
                            , 'id'=>'UF'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-2">
                        {!! Form::label('JOG_CEP', 'CEP') !!}
                        {!! Form::text ('JOG_CEP', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'10'
                            , 'id'=>'JOG_CEP'
                            ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-11">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Endereço 2
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="form-group col-lg-6">
                        {!! Form::label('JOG_ENDERECO2', 'Endereço 2') !!}
                        {!! Form::text ('JOG_ENDERECO2', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'200'
                            , 'id'=>'JOG_ENDERECO2'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-5">
                        {!! Form::label('JOG_BAIRRO2', 'Bairro') !!}
                        {!! Form::text ('JOG_BAIRRO2', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'100'
                            , 'id'=>'JOG_BAIRRO2'
                            ]) !!}
                    </div>

                    <div class="form-group col-lg-6">
                        {!! Form::label  ('ID_CIDADE2', 'Cidade') !!}
                        {!! Form::hidden ('ID_CIDADE2'  , null, ['class'=>'form-control input-sm', 'id'=>'ID_CIDADE2']) !!}
                        {!! Form::text   ('CIDADE_NOME2', null, ['class'=>'form-control input-sm', 'id'=>'CIDADE_NOME2', 'maxlength' =>'50']) !!}
                    </div>
                    <div class="form-group col-lg-2">
                        {!! Form::label('UF2', 'UF') !!}
                        {!! Form::text ('UF2', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'10'
                            , 'id'=>'UF2'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-2">
                        {!! Form::label('JOG_CEP2', 'CEP') !!}
                        {!! Form::text ('JOG_CEP2', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'10'
                            , 'id'=>'JOG_CEP2'
                            ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Contatos
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="form-group col-lg-4">
                        {!! Form::label('JOG_REFTEL1', 'Referência 1') !!}
                        {!! Form::text ('JOG_REFTEL1', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'60'
                            , 'id'=>'JOG_REFTEL1'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-2">
                        {!! Form::label('JOG_TEL1', 'Telefone 1') !!}
                        {!! Form::text ('JOG_TEL1', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'40'
                            , 'id'=>'JOG_TEL1'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-4">
                        {!! Form::label('JOG_REFTEL2', 'Referência 2') !!}
                        {!! Form::text ('JOG_REFTEL2', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'60'
                            , 'id'=>'JOG_REFTEL2'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-2">
                        {!! Form::label('JOG_TEL2', 'Telefone 2') !!}
                        {!! Form::text ('JOG_TEL2', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'40'
                            , 'id'=>'JOG_TEL2'
                            ]) !!}
                    </div>

                    <div class="form-group col-lg-4">
                        {!! Form::label('JOG_REFTEL3', 'Referência 3') !!}
                        {!! Form::text ('JOG_REFTEL3', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'40'
                            , 'id'=>'JOG_REFTEL3'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-2">
                        {!! Form::label('JOG_TEL3', 'Telefone 3') !!}
                        {!! Form::text ('JOG_TEL3', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'40'
                            , 'id'=>'JOG_TEL3'
                            ]) !!}
                    </div>

                    <div class="form-group col-lg-4">
                        {!! Form::label('JOG_REFTEL4', 'Referência 4') !!}
                        {!! Form::text ('JOG_REFTEL4', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'60'
                            , 'id'=>'JOG_REFTEL4'
                            ]) !!}
                    </div>
                    <div class="form-group col-lg-2">
                        {!! Form::label('JOG_TEL4', 'Telefone 4') !!}
                        {!! Form::text ('JOG_TEL4', null,
                            ['class'=>'form-control'
                            , 'maxlength' =>'40'
                            , 'id'=>'JOG_TEL4'
                            ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-11">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Outros Dados
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-5">
                            {!! Form::label('jog_origem', 'Origem') !!}
                            {!! Form::text ('JOG_ORIGEM', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'200'
                                , 'id'=>'JOG_ORIGEM'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-1"></div>
                        <div class="form-group col-lg-5">
                            {!! Form::label('ID_PARCEIRO', 'Parceiro') !!}
                            {!! Form::select('ID_PARCEIRO', $parceiros, null, ['class'=>'form-control input-md']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    xxurl = "{{ url( 'cidades/autocomplete/') }}" ;
    $(document).ready(function () {
        $("#form_ .date").datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            autoclose: true,
            todayHighlight: true
        });

        $('#cidade_nome').autocomplete({
            minLength: 1,
            source: xxurl,
            select: function (event, ui) {
                //alert('select');
                $('#id_cidade_natal').val(ui.item.id);
                $('#cidade_nome').val(ui.item.value);
            },
            change: function (event, ui) {
                //alert(ui.item);
                if (!ui.item){
                    pesquisa = $('#cidade_nome').val();
                    //alert( $('#cidade_nome').search(pesquisa));
                    $("#id_cidade_natal").val('');
                }
            }
        });

        $('#cidade_nome1').autocomplete({
            minLength: 1,
            source: xxurl,
            select: function (event, ui) {
                //alert('select');
                $('#id_cidade').val(ui.item.id);
                $('#cidade_nome1').val(ui.item.value);
            },
            change: function (event, ui) {
                //alert(ui.item);
                if (!ui.item){
                    pesquisa = $('#cidade_nome1').val();
                    //alert( $('#cidade_nome').search(pesquisa));
                    $("#id_cidade").val('');
                }
            }
        });

        $('#cidade_nome2').autocomplete({
            minLength: 1,
            source: xxurl,
            select: function (event, ui) {
                //alert('select');
                $('#id_cidade2').val(ui.item.id);
                $('#cidade_nome2').val(ui.item.value);
            },
            change: function (event, ui) {
                //alert(ui.item);
                if (!ui.item){
                    pesquisa = $('#cidade_nome2').val();
                    //alert( $('#cidade_nome').search(pesquisa));
                    $("#id_cidade2").val('');
                }
            }
        });
    });

    $(document).on('click', '.panel-heading span.clickable', function(e){
        var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
    })

    $(document).on('ready', function() {
        $("#input-6").fileinput({
            showUpload: false,
            showClose: false,
            uploadAsync:true,
            //maxFileCount: 10,
            mainClass: "input-group-lg",
            previewSettings: {
                image: {width: "auto", height: "160px"},
                other: {width: "160px", height: "160px"}
            },
            showCaption: false
        });
    });


    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result)
                        .width(120)
                        .height(120);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgfoto").change(function(){
        readURL(this);
    });

</script>