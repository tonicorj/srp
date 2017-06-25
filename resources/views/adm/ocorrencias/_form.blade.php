{!! Form::hidden('ID_JOGADOR_OCORRENCIA', null, ['class'=>'form-control', 'id'=>'ID_JOGADOR_OCORRENCIA']) !!}
{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="form-group col-lg-2">
        {!! Form::label('OCORR_DATA_S', trans('messages.tit_ocorrenciadata')) !!}
        <div class="input-group date" id="OCORR_DATA_S">
            {!! Form::text ('OCORR_DATA_S', null,
                ['class'=>'form-control'
                , 'maxlength' =>'10'
                , 'id'=>'OCORR_DATA_S'
                , 'required'=>''
                ]) !!}
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('OCORR_TIPO' , trans('messages.tit_ocorrenciatipo')) !!}
        {!! Form::select('OCORR_TIPO', $gravidades, null, ['class'=>'form-control input-md']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-5">
        {!! Form::label('ID_JOGADOR' , trans('messages.tit_jogador')) !!}
        {!! Form::hidden('ID_JOGADOR', null, ['class'=>'form-control input-md']) !!}
        {!! Form::text('JOG_NOME'  , null, ['class'=>'form-control input-md', 'id' => 'JOG_NOME']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-10">
        {!! Form::label('OCORR_DESCRICAO' , trans('messages.tit_ocorrenciadescricao')) !!}
        {!! Form::textarea('OCORR_DESCRICAO', null, ['class'=>'form-control input-md']) !!}
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
        $('#JOG_NOME').autocomplete({
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
