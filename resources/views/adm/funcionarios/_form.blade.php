{!! Form::hidden('ID_USUARIO', null, ['class'=>'form-control', 'id'=>'ID_USUARIO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">
    <div class="form-group col-lg-11">
        {!! Form::label('NOME_USUARIO' , trans('messages.tit_funcionario')) !!}
        {!! Form::text('NOME_USUARIO', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('DATA_NASCIMENTO' , trans('messages.tit_datanascimento')) !!}
        <div class="input-group date" id="DATA_NASCIMENTO_S">
            {!! Form::text ('DATA_NASCIMENTO_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'DATA_NASCIMENTO_S'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
    <div class="form-group col-lg-1"></div>
    <div class="form-group col-lg-3">
        {!! Form::label('FUNC_DATA_ENTRADA' , trans('messages.tit_funcionario_dataentrada')) !!}
        <div class="input-group date" id="FUNC_DATA_ENTRADA_S">
            {!! Form::text ('FUNC_DATA_ENTRADA_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'FUNC_DATA_ENTRADA_S'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
    <div class="form-group col-lg-1"></div>
    <div class="form-group col-lg-3">
        {!! Form::label('FUNC_DATA_SAIDA' , trans('messages.tit_funcionario_datasaida')) !!}
        <div class="input-group date" id="FUNC_DATA_SAIDA_S">
            {!! Form::text ('FUNC_DATA_SAIDA_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'FUNC_DATA_SAIDA_S'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('FUNC_DOCUMENTO' , trans('messages.tit_funcionariodocumento')) !!}
        {!! Form::text('FUNC_DOCUMENTO', null, ['class'=>'form-control input-md']) !!}
    </div>
    <div class="form-group col-lg-1"></div>
    <div class="form-group col-lg-5">
        {!! Form::label('FUNC_CPF' , trans('messages.tit_cpf')) !!}
        {!! Form::text('FUNC_CPF', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('FUNC_PASSAPORTE' , trans('messages.tit_passaporte')) !!}
        {!! Form::text('FUNC_PASSAPORTE', null, ['class'=>'form-control input-md']) !!}
    </div>
    <div class="form-group col-lg-1"></div>
    <div class="form-group col-lg-5">
        {!! Form::label('FUNC_TELEFONE' , trans('messages.tit_telefone')) !!}
        {!! Form::text('FUNC_TELEFONE', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-7">
        {!! Form::label('MAIL_USUARIO' , trans('messages.tit_funcionarioemail')) !!}
        {!! Form::text('MAIL_USUARIO', null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-7">
        {!! Form::label('ID_DEPARTAMENTO' , trans('messages.tit_departamento')) !!}
        {!! Form::select('ID_DEPARTAMENTO', $departamentos, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-7">
        {!! Form::label('ID_CARGO' , trans('messages.tit_cargo')) !!}
        {!! Form::select('ID_CARGO', $cargos, null, ['class'=>'form-control input-md']) !!}
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
