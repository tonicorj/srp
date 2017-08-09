{!! Form::hidden('ID_ANAMNESE_NUTRICIONAL', null, ['class'=>'form-control', 'id'=>'ID_ANAMNESE_NUTRICIONAL']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('DATA_ANAMNESE', trans('messages.tit_anamnese_data')) !!}
        <div class="input-group date" id="VISITA_DATA_S">
            {!! Form::text ('DATA_ANAMNESE_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'DATA_ANAMNESE_S'
                , 'required'=>''
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
    <div class="form-group col-lg-1"></div>
    <div class="form-group col-lg-3">
        {!! Form::label('JOG_IDADE', trans('messages.tit_idade')) !!}
        {!! Form::text ('JOG_IDADE', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-9">
        {!! Form::label('ID_JOGADOR' , trans('messages.tit_jogador')) !!}
        {!! Form::select('ID_JOGADOR', $jogadores, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-9">
        {!! Form::label('NATURALIDADE' , trans('messages.tit_naturalidade')) !!}
        {!! Form::text('NATURALIDADE', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_peso_altura') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-3">
                        {!! Form::label('JOGADOR_ESTATURA', trans('messages.tit_altura')) !!}
                        {!! Form::text ('JOGADOR_ESTATURA', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('JOGADOR_MMUSCULAR', trans('messages.tit_peso')) !!}
                        {!! Form::text ('JOGADOR_MMUSCULAR', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('PESO_IDEAL', trans('messages.tit_pesoideal')) !!}
                        {!! Form::text ('PESO_IDEAL', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('JOG_PERC_GORDURA', trans('messages.tit_perc_gordura')) !!}
                        {!! Form::text ('JOG_PERC_GORDURA', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_anamnese_antecedente') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('ANTECEDENTES_CARDIACOS', 'S', null )  !!}
                                {!! trans('messages.tit_antecedente_cardiaco') !!}
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('ANTECEDENTES_NEUROLOGICOS', 'S', null )  !!}
                                {!! trans('messages.tit_antecedente_neurologicos') !!}
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('ANTECEDENTES_ALT_HORMONAIS', 'S', null )  !!}
                                {!! trans('messages.tit_antecedente_alt_hormonais') !!}
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('ANTECEDENTES_ALT_PESO', 'S', null )  !!}
                                {!! trans('messages.tit_antecedente_alt_peso') !!}
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('ANTECEDENTES_GASTRICOS', 'S', null )  !!}
                                {!! trans('messages.tit_antecedente_gastricos') !!}
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('ANTECEDENTES_RESPIRATORIOS', 'S', null )  !!}
                                {!! trans('messages.tit_antecedente_respiratorios') !!}
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('ANTECEDENTES_FICA_RESFRIADO', 'S', null )  !!}
                                {!! trans('messages.tit_antecedente_resfriado') !!}
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('ANTECEDENTES_OBSIDADE', 'S', null )  !!}
                                {!! trans('messages.tit_antecedente_obsidade') !!}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_peso_anterior') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-3">
                        {!! Form::label('PESO_MIN_ULTIMO', trans('messages.tit_pesomin_ultimo')) !!}
                        {!! Form::text ('PESO_MIN_ULTIMO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('PESO_MED_ULTIMO', trans('messages.tit_pesomed_ultimo')) !!}
                        {!! Form::text ('PESO_MED_ULTIMO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('PESO_MAX_ULTIMO', trans('messages.tit_pesomax_ultimo')) !!}
                        {!! Form::text ('PESO_MAX_ULTIMO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('PESO_IDEAL', trans('messages.tit_pesoconsidera_ideal')) !!}
                        {!! Form::text ('PESO_IDEAL', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_anamnese_outras') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-11">
                        {!! Form::label('MEDICAMENTOS_USO', trans('messages.tit_medicamentos_em_uso')) !!}
                        {!! Form::text ('MEDICAMENTOS_USO', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-11">
                        {!! Form::label('SUPLEMENTOS_USO', trans('messages.tit_suplementos_uso')) !!}
                        {!! Form::text ('SUPLEMENTOS_USO', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_anamnese_hidratacao') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label>
                            {!! trans('messages.tit_hidratacao_frase') !!}
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label>
                            {!! trans('messages.tit_hidratacao_treino') !!}
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group col-lg-5">
                            {!! Form::label('HIDRATACAO_CASA_COPOS', trans('messages.tit_hidratacao_copos_casa')) !!}
                            {!! Form::text ('HIDRATACAO_CASA_COPOS', null, ['class'=>'form-control', 'style' => 'width:30%']) !!}
                        </div>
                        <div class="form-group col-lg-2"></div>
                        <div class="form-group col-lg-5">
                            {!! Form::label('HIDRATACAO_CASA_LITROS', trans('messages.tit_hidratacao_litros_casa')) !!}
                            {!! Form::text ('HIDRATACAO_CASA_LITROS', null, ['class'=>'form-control', 'style' => 'width:30%']) !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group col-lg-5">
                            {!! Form::label('HIDRATACAO_TREINO_COPOS', trans('messages.tit_hidratacao_copos_treino')) !!}
                            {!! Form::text ('HIDRATACAO_TREINO_COPOS', null, ['class'=>'form-control', 'style' => 'width:30%']) !!}
                        </div>
                        <div class="form-group col-lg-2"></div>
                        <div class="form-group col-lg-5">
                            {!! Form::label('HIDRATACAO_GATORADE', trans('messages.tit_hidratacao_gatorade')) !!}
                            {!! Form::text ('HIDRATACAO_GATORADE', null, ['class'=>'form-control', 'style' => 'width:30%']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_anamnese_habitointestinal') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-11">
                        {!! trans('messages.tit_habitointestinal_frase') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        {!! Form::label('HABITO_INTESTINAL_NUM_VEZES', trans('messages.tit_habitointestinal_numvezes')) !!}
                        {!! Form::text ('HABITO_INTESTINAL_NUM_VEZES', null, ['class'=>'form-control', 'style' => 'width:30%']) !!}

                    </div>
                    <div class="form-group col-lg-9">
                        {!! Form::label('HABITO_INTESTINAL', trans('messages.tit_habitointestinal_como')) !!}
                        <div class="radio">
                            <label class="radio-inline">
                                {!! Form::radio('HABITO_INTESTINAL', '1', ($habitos == '1')) !!}{{ trans('messages.tit_habito_intestinal_1') }}
                            </label>
                            <label class="radio-inline">
                                {!! Form::radio('HABITO_INTESTINAL', '2', ($habitos =='2')) !!}{{ trans('messages.tit_habito_intestinal_2') }}
                            </label>
                            <label class="radio-inline">
                                {!! Form::radio('HABITO_INTESTINAL', '3', ($habitos =='3')) !!}{{ trans('messages.tit_habito_intestinal_3') }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_anamnese_alcool') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-11">
                        <label>{!! trans('messages.tit_alcool_dias') !!}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group col-lg-3">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('ALCOOL_FDS', 'S', null )  !!}
                                    {!! trans('messages.tit_alcool_fds') !!}
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('ALCOOL_DIASEMANA', 'S', null )  !!}
                                    {!! trans('messages.tit_alcool_diassemana') !!}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-2">
                        {!! Form::label('ALCOOL_QUANTO', trans('messages.tit_alcool_quanto')) !!}
                        {!! Form::text ('ALCOOL_QUANTO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-10">
                        {!! Form::label('ALCCOL_QUAL', trans('messages.tit_alcool_qual')) !!}
                        {!! Form::text ('ALCCOL_QUAL', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_anamnese_fumo') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-2">
                        {!! Form::label('HABITO_INTESTINAL', trans('messages.tit_fuma')) !!}
                        <div class="radio">
                            <label class="radio-inline">
                                {!! Form::radio('FUMO_FLAG', 'S', ($fuma == 'S')) !!}{{ trans('messages.sim') }}
                            </label>
                            <label class="radio-inline">
                                {!! Form::radio('FUMO_FLAG', 'N', ($fuma =='N')) !!}{{ trans('messages.nao') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-lg-10">
                        {!! Form::label('FUMO_QUANTO', trans('messages.tit_fumaquanto')) !!}
                        {!! Form::text ('FUMO_QUANTO', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_anamnese_sono') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-11">
                        {!! trans('messages.tit_horario_dormir_casa') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        {!! Form::label('HORARIO_DORMIR', trans('messages.tit_horario_dormir')) !!}
                        {!! Form::text ('HORARIO_DORMIR', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('HORARIO_ACORDAR', trans('messages.tit_horario_acordar')) !!}
                        {!! Form::text ('HORARIO_ACORDAR', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="radio">
                            <label class="radio-inline">
                                {!! Form::radio('SONO_TRANQUILO', 'T', ($sono == 'T')) !!}{{ trans('messages.tit_horario_tranquilo') }}
                            </label>
                            <label class="radio-inline">
                                {!! Form::radio('SONO_AGITADO'  , 'A', ($sono =='A')) !!}{{ trans('messages.tit_horario_agitado') }}
                            </label>
                        </div>
                    </div>
                </div>

                <!--
                <div class="row">
                    <div class="col-lg-11">
                        {!! trans('messages.tit_horario_dormir_concentracao') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        {!! Form::label('HORARIO_DORMIR', trans('messages.tit_horario_dormir')) !!}
                        {!! Form::text ('HORARIO_DORMIR', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('HORARIO_ACORDAR', trans('messages.tit_horario_acordar')) !!}
                        {!! Form::text ('HORARIO_ACORDAR', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('SONO_TRANQUILO', trans('messages.tit_horario_tranquilo')) !!}
                        {!! Form::text ('SONO_TRANQUILO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                    <div class="form-group col-lg-3">
                        {!! Form::label('SONO_AGITADO', trans('messages.tit_horario_agitado')) !!}
                        {!! Form::text ('SONO_AGITADO', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
                    </div>
                </div>
                -->
                <div class="row">
                    <div class="col-lg-11">
                        {!! trans('messages.tit_horario_cafemanha') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <div class="radio">
                            <label class="radio-inline">
                                {!! Form::radio('CAFE_SIM', 'S', ($cafe == 'S')) !!}{{ trans('messages.sim') }}
                            </label>
                            <label class="radio-inline">
                                {!! Form::radio('CAFE_NAO'  , 'N', ($cafe =='N')) !!}{{ trans('messages.nao') }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_anamnese_alimentos') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-12">
                        {!! Form::label('ALIMENTOS_INTOLERANCIA', trans('messages.tit_anamnese_intolerancia')) !!}
                        {!! Form::text ('ALIMENTOS_INTOLERANCIA', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        {!! Form::label('ALIMENTOS_PREFERENCIAS', trans('messages.tit_anamnese_preferencias')) !!}
                        {!! Form::text ('ALIMENTOS_PREFERENCIAS', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        {!! Form::label('ALIMENTOS_HORARIO_FOME', trans('messages.tit_anamnese_horariofome')) !!}
                        {!! Form::text ('ALIMENTOS_HORARIO_FOME', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        {!! Form::label('ALIMENTOS_QUEM_PREPARA', trans('messages.tit_anamnese_quemprepara')) !!}
                        {!! Form::text ('ALIMENTOS_QUEM_PREPARA', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        {!! Form::label('HABITO_ALIMENTAR', trans('messages.tit_anamnese_habitoalimentar')) !!}<br>
                        {{trans('messages.tit_anamnese_habitoalimentar_frase1')}}<br>
                        {{trans('messages.tit_anamnese_habitoalimentar_frase2')}}<br>
                        {{trans('messages.tit_anamnese_habitoalimentar_frase3')}}<br>
                        {!! Form::textarea ('HABITO_ALIMENTAR', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{!! trans('messages.tit_anamnese_atividadefisica') !!}</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-12">
                        {!! Form::label('ATIVIDADE_FISICA_PASSADA' , trans('messages.tit_anamnese_atividadefisica_passada')) !!}
                        {!! Form::textarea('ATIVIDADE_FISICA_PASSADA', null, ['class'=>'form-control input-md']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        {!! Form::label('ATIVIDADE_FISICA_ATUAL' , trans('messages.tit_anamnese_atividadefisica_atual')) !!}
                        {!! Form::textarea('ATIVIDADE_FISICA_ATUAL', null, ['class'=>'form-control input-md']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-12">
        {!! Form::label('OBSERVACAO' , trans('messages.tit_observacao')) !!}
        {!! Form::textarea('OBSERVACAO', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#form_ .date').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            autoclose: true,
            todayHighlight: true
        });
    });
</script>
