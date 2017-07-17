{!! Form::hidden('ID_ATEND_ASSIST_SOCIAL', null, ['class'=>'form-control', 'id'=>'ID_ATEND_ASSIST_SOCIAL']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('DATA_INCLUSAO_S', trans('messages.tit_cuidados_data')) !!}
        <div class="input-group date" id="VISITA_DATA_S">
            {!! Form::text ('DATA_INCLUSAO_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'DATA_INCLUSAO_S'
                , 'required'=>''
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-7">
        {!! Form::label('ID_JOGADOR' , trans('messages.tit_jogador')) !!}
        {!! Form::hidden('ID_JOGADOR'  , null, ['class'=>'form-control input-md']) !!}
        {!! Form::text('JOG_NOME_COMPLETO', null, ['class'=>'form-control input-md', 'id' => 'JOG_NOME_COMPLETO']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-7">
        {!! Form::label('ID_MEDICO' , trans('messages.tit_medico')) !!}
        {!! Form::select('ID_MEDICO', $medicos, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('TIPO_SANGUINEO' , trans('messages.tit_cuidados_tiposanguineo')) !!}
        {!! Form::text('TIPO_SANGUINEO',  null, ['class'=>'form-control input-md', 'style' => 'width:20%']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-12">
        {!! Form::label('CUIDADO_OBS' , trans('messages.tit_cuidados')) !!}
        {!! Form::textarea('CUIDADO_OBS', null, ['class'=>'form-control input-md']) !!}
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

        var xxurl = "{{ url( 'jogadores/autocomplete' ) }}" ;
        $('#JOG_NOME_COMPLETO').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: xxurl,
                    dataType: "json",
                    beforeSend: function(){
                        $("h2").html("Carregando...");
                    },
                    data: {term: request.term},
                    success: function (data) {
                        response( data );
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        //alert("Status: " + textStatus); alert("Error: " + errorThrown);
                    }
                });
            },
            minLength: 2,
            select: function (event, ui) {
                $('#ID_JOGADOR').val(ui.item.id);
                //alert("Selected: " + ui.item.value + " aka " + ui.item.id);
            }
        });

    });
</script>
