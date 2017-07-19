{!! Form::hidden('ID_ESTADIO', null, ['class'=>'form-control', 'id'=>'ID_ESTADIO']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="row">
    <div class="form-group col-lg-9">
        {!! Form::label('ESTADIO_NOME', trans('messages.tit_estadio')) !!}
        {!! Form::text ('ESTADIO_NOME', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group col-lg-3">
        {!! Form::label('UF', trans('messages.tit_uf')) !!}
        {!! Form::text ('UF', null, ['class'=>'form-control', 'style' => 'width:50%']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-11">
        {!! Form::label('ESTADIO_NOME_REAL', trans('messages.tit_estadio_real')) !!}
        {!! Form::text ('ESTADIO_NOME_REAL', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-9">
        {!! Form::label('ID_CIDADE' , trans('messages.tit_cidade')) !!}
        {!! Form::select('ID_CIDADE', $cidades, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-9">
        {!! Form::label('ID_PAIS' , trans('messages.tit_pais')) !!}
        {!! Form::select('ID_PAIS', $paises, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-11">
        {!! Form::label('ESTADIO_OBS' , trans('messages.tit_observacao')) !!}
        {!! Form::textarea('ESTADIO_OBS', null, ['class'=>'form-control input-md']) !!}
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
