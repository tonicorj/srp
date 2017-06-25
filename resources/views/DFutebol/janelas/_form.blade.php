{!! Form::hidden('ID_JANELA', null, ['class'=>'form-control', 'id'=>'ID_JANELA']) !!}

<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('JANELA_NOME', trans('messages.tit_janela')) !!}
        {!! Form::text ('JANELA_NOME', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'JANELA_NOME'
            , 'required'=>''
            ]) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('JANELA_INICIO_S', trans('messages.tit_janela_inicio')) !!}
        <div class="input-group date" id="JANELA_INICIO_S">
            {!! Form::text ('JANELA_INICIO_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'JANELA_INICIO_S'
                , 'required'=>''
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>

    <div class="form-group col-lg-6">
        {!! Form::label('JANELA_FINAL_S', trans('messages.tit_janela_final')) !!}
        <div class="input-group date" id="JANELA_FINAL_S">
            {!! Form::text ('JANELA_FINAL_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'JANELA_FINAL_S'
                , 'required'=>''
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

