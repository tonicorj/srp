{!! Form::hidden('ID_JOGADOR_OCORRENCIA', null, ['class'=>'form-control', 'id'=>'ID_JOGADOR_OCORRENCIA']) !!}

<div class="table">
    <div class="row">
        <div class="col-lg-7">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Dados do Ocorrência
                </div>
                <div class="panel-body">
                    <div class="form-group col-lg-4">
                        {!! Form::label('ocorr_data', 'Data da Ocorrência') !!}
                        <div class="input-group date" id="_OCORR_DATA">
                            {!! Form::text ('OCORR_DATA', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'10'
                                , 'id'=>'OCORR_DATA'
                                , 'required'=>''
                                ]) !!}
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        {!! Form::label('ocorr_tipo', 'Gravidade') !!}
                        {!! Form::select('OCORR_TIPO', $gravidades, null, ['class'=>'form-control input-md']) !!}
                    </div>
                    <div class="form-group col-lg-8">
                        {!! Form::label('ID_JOGADOR', 'Jogador') !!}
                        {!! Form::select('ID_JOGADOR', $jogadores, null, ['class'=>'form-control input-md']) !!}
                    </div>
                    <div class="form-group col-lg-10">
                        {!! Form::label('OCORR_DESCRICAO', 'Descrição') !!}
                        {!! Form::textarea ('OCORR_DESCRICAO', null,
                            ['class'=>'form-control'
                            , 'id'=>'OCORR_DESCRICAO'
                            , 'rows' => 5
                            , 'cols' => 80
                            ]) !!}
                    </div>
                </div>
            </div>
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

    $(document).on('click', '.panel-heading span.clickable', function(e){
        var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
    })

    $(document).on('ready', function() {
        $("#input-6").fileinput({
            showUpload: false,
            showClose: false,
            uploadAsync:true,
            //maxFileCount: 10,
            mainClass: "input-group-lg",
            previewSettings: {
                image: {width: "auto", height: "160px"},
                other: {width: "160px", height: "160px"}
            },
            showCaption: false
        });
    });


    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result)
                        .width(100)
                        .height(100);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgFoto").change(function(){
        readURL(this);
    });
</script>