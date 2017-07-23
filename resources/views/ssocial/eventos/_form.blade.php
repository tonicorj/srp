{!! Form::hidden('ID_EVENTO', null, ['class'=>'form-control', 'id'=>'ID_EVENTO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-lg-4">
        {!! Form::label('EVENTO_DATA_S', trans('messages.tit_evento_data')) !!}
        <div class="input-group date" id="EVENTO_DATA_S">
            {!! Form::text ('EVENTO_DATA_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'EVENTO_DATA_S'
                , 'required'=>'true'
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-8">
        {!! Form::label('EVENTO_TITULO', trans('messages.tit_evento_titulo')) !!}
        {!! Form::text ('EVENTO_TITULO', null,
            ['class'=>'form-control'
            , 'id'=>'EVENTO_TITULO'
            , 'required'=>'true'
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-8">
        {!! Form::label('EVENTO_LOCAL', trans('messages.tit_evento_local')) !!}
        {!! Form::text ('EVENTO_LOCAL', null,
            ['class'=>'form-control'
            , 'id'=>'EVENTO_LOCAL'
            , 'required'=>'true'
            ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-8">
        {!! Form::label('ID_CATEGORIA' , trans('messages.tit_categoria')) !!}
        {!! Form::select('ID_CATEGORIA', $categorias, null, ['class'=>'form-control input-md', 'required'=>'true']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-8">
        {!! Form::label('ID_DEPARTAMENTO' , trans('messages.tit_departamento')) !!}
        {!! Form::select('ID_DEPARTAMENTO', $departamentos, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('OBS_EVENTO' , trans('messages.tit_evento_obs')) !!}
        {!! Form::textarea('OBS_EVENTO', null, ['class'=>'form-control input-md']) !!}
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
