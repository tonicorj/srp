{!! Form::hidden('ID_JUIZ', null, ['class'=>'form-control', 'id'=>'ID_JUIZ']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">
    <div class="form-group col-lg-9">
        {!! Form::label('JUIZ_NOME', trans('messages.tit_juiz')) !!}
        {!! Form::text ('JUIZ_NOME', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('UF', trans('messages.tit_uf')) !!}
        {!! Form::text ('UF', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
    </div>

    <div class="form-group col-lg-4">
        {!! Form::label('JUIZ_DT_NASCIMENTO_S', trans('messages.tit_datanascimento')) !!}
        <div class="input-group date" id="JUIZ_DT_NASCIMENTO_S">
            {!! Form::text ('JUIZ_DT_NASCIMENTO_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'JUIZ_DT_NASCIMENTO_S'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
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
