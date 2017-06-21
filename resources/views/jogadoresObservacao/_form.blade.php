{!! Form::hidden('ID_JOGADOR', null, ['class'=>'form-control', 'id'=>'ID_JOGADOR']) !!}

<div class="table">
    <div class="row">
        <div class="col-lg-7">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Dados do Jogador
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-8">
                            {!! Form::label('jog_nome_apelido', trans('messages.tit_apelido')) !!}
                            {!! Form::text ('JOG_NOME_APELIDO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'60'
                                , 'id'=>'JOG_NOME_APELIDO'
                                , 'required'=>''
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::label('jog_dt_nascimento', trans('messages.tit_datanascimento')) !!}
                            <div class="input-group date" id="_JOG_DT_NASCIMENTO">
                            {!! Form::text ('JOG_DT_NASCIMENTO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'10'
                                , 'id'=>'JOG_DT_NASCIMENTO'
                                , 'required'=>''
                                ]) !!}
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            {!! Form::label('jog_nome_completo', trans('messages.tit_nomecompleto')) !!}
                            {!! Form::text ('JOG_NOME_COMPLETO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'120'
                                , 'id'=>'JOG_NOME_COMPLETO'
                                , 'required'=>''
                                ]) !!}
                       </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            {!! Form::label('jog_posicao', trans('messages.tit_posicao')) !!}
                            {!! Form::text ('JOG_POSICAO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'8'
                                , 'id'=>'JOG_POSICAO'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::label('jog_pe_principal', trans('messages.tit_pedominante')) !!}
                            {!! Form::text ('JOG_PE_PRINCIPAL', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'8'
                                , 'id'=>'JOG_PE_PRINCIPAL'
                                ]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3">
                            {!! Form::label('jog_peso', trans('messages.tit_peso')) !!}
                            {!! Form::text ('JOG_PESO', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'3'
                                , 'id'=>'JOG_PESO'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('jog_altura', trans('messages.tit_altura')) !!}
                            {!! Form::text ('JOG_ALTURA', null,
                                ['class'=>'form-control'
                                , 'id'=>'JOG_ALTURA'
                                ]) !!}
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::label('jog_num_pe', trans('messages.tit_chuteira')) !!}
                            {!! Form::text ('JOG_NUM_PE', null,
                                ['class'=>'form-control'
                                , 'maxlength' =>'2'
                                , 'id'=>'JOG_NUM_PE'
                                ]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                            {!! Form::label('id_pais', trans('messages.tit_paisnatal')) !!}
                            {!! Form::select('id_pais', $paises, null, ['class'=>'form-control input-md']) !!}
                        </div>
                        <div class="form-group col-lg-7">
                            {!! Form::label  ('id_cidade_natal', trans('messages.tit_cidadenatal')) !!}
                            {!! Form::hidden ('ID_CIDADE_NATAL', null, ['class'=>'form-control input-sm', 'id'=>'ID_CIDADE_NATAL']) !!}
                            {!! Form::text   ('CIDADE_NOME'    , null, ['class'=>'form-control input-sm', 'id'=>'CIDADE_NOME', 'maxlength' =>'50']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">{!! trans('messages.tit_foto') !!}</div>
                        <div class="panel-body">
                            <center>
                                {!! Html::image($foto, '', array('class' => 'image','id'=>'blah')) !!}
                                <label class="btn btn-primary" for="imgFoto">
                                    <input type='file' id="imgFoto" name="imgFoto" style='display:none;'/>
                                    {!! trans('messages.tit_selecione') !!}
                                </label>
                                <!--<input type='file' id="imgFoto" style='display:none;'/>-->
                                <!--<input id="input6" name="input6" type="file" class="file-loading" data-allowed-file-extensions='["bmp", "png", "jpg"]'>-->
                            </center>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Registros
                            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                {!! Form::label('JOG_CBF', trans('messages.tit_codcbf')) !!}
                                {!! Form::text ('JOG_CBF', null,
                                    ['class'=>'form-control'
                                    , 'maxlength' =>'8'
                                    , 'id'=>'JOG_CBF'
                                    ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script type="text/javascript">
    xxurl = "{{ url( 'cidades/autocomplete/') }}" ;
    $(document).ready(function () {
        $('#form_ .date').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            autoclose: true,
            todayHighlight: true
        });

        $('#CIDADE_NOME').autocomplete({
            minLength: 1,
            source: xxurl,
            select: function (event, ui) {
                //alert('select');
                $('#ID_CIDADE_NATAL').val(ui.item.id);
                $('#CIDADE_NOME').val(ui.item.value);
            },
            change: function (event, ui) {
                //alert(ui.item);
                if (!ui.item){
                    pesquisa = $('#CIDADE_NOME').val();
                    //alert( $('#cidade_nome').search(pesquisa));
                    $("#ID_CIDADE_NATAL").val('');
                }
            }
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