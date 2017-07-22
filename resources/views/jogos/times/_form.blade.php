{!! Form::hidden('ID_TIME', null, ['class'=>'form-control', 'id'=>'ID_TIME']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">
    <div class="form-group col-lg-8">
        {!! Form::label('TIME_NOME', trans('messages.tit_time')) !!}
        {!! Form::text ('TIME_NOME', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group col-lg-3">
        {!! Form::label('TIME_DT_FUNDACAO_S', trans('messages.tit_dt_fundacao')) !!}
        <div class="input-group date" id="TIME_DT_FUNDACAO_S">
            {!! Form::text ('TIME_DT_FUNDACAO_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'TIME_DT_FUNDACAO_S'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-11">
        {!! Form::label('TIME_NOMEREAL', trans('messages.tit_time_nomereal')) !!}
        {!! Form::text ('TIME_NOMEREAL', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-11">
        {!! Form::label('TIME_ENDERECO', trans('messages.tit_endereco')) !!}
        {!! Form::text ('TIME_ENDERECO', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-8">
        {!! Form::label('ID_CIDADE' , trans('messages.tit_cidade')) !!}
        {!! Form::select('ID_CIDADE', $cidades, null, ['class'=>'form-control input-md']) !!}
    </div>

    <div class="form-group col-lg-2">
        {!! Form::label('UF', trans('messages.tit_uf')) !!}
        {!! Form::text ('UF', null, ['class'=>'form-control', 'style'=>'width:50%']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-8">
        {!! Form::label('ID_PAIS' , trans('messages.tit_pais')) !!}
        {!! Form::select('ID_PAIS', $paises, null, ['class'=>'form-control input-md']) !!}
    </div>

    <div class="form-group col-lg-3">
        {!! Form::label('TIME_CEP' , trans('messages.tit_cep')) !!}
        {!! Form::text('TIME_CEP', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('TIME_TELEFONE', trans('messages.tit_telefone')) !!}
        {!! Form::text ('TIME_TELEFONE', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-lg-6">
        {!! Form::label('TIME_EMAIL', trans('messages.tit_email')) !!}
        {!! Form::text ('TIME_EMAIL', null, ['class'=>'form-control']) !!}
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
