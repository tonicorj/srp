{!! Form::hidden('ID_CURSO', null, ['class'=>'form-control', 'id'=>'ID_CURSO']) !!}

<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('CURSO_NOME', trans('messages.tit_curso_nome')) !!}
        {!! Form::text ('CURSO_NOME', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'CURSON_NOME'
            , 'required'=>'true'
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('CURSO_DT_INICIO_S', trans('messages.tit_curso_dt_inicial')) !!}
        <div class="input-group date" id="CURSO_DT_INICIO_S">
            {!! Form::text ('CURSO_DT_INICIO_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'CURSO_DT_INICIO_S'
                , 'required'=>''
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
    <div class="form-group col-lg-3">
        {!! Form::label('CURSO_DT_FINAL_S', trans('messages.tit_curso_dt_final')) !!}
        <div class="input-group date" id="CURSO_DT_FINAL_S">
            {!! Form::text ('CURSO_DT_FINAL_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'CURSO_DT_FINAL_S'
                , 'required'=>''
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('CURSO_EMPRESA', trans('messages.tit_curso_empresa')) !!}
        {!! Form::text ('CURSO_EMPRESA', null,
            ['class'=>'form-control'
            , 'maxlength' =>'100'
            , 'id'=>'CURSO_EMPRESA'
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('CURSO_OBS' , trans('messages.tit_curso_obs')) !!}
        {!! Form::textarea('CURSO_OBS', null, ['class'=>'form-control input-md']) !!}
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
