<style>
#radioBtn .notActive{
    color: #3276b1;
    background-color: #fff;
}
</style>




<br>

<div  class="row">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
            <div align="center">
                <br>
                <div  class="input-group">
                    <div id="radioBtn" class="btn-group">
                        <a class="btn btn-primary btn-sm notActive"    data-toggle="ori_desori"    data-title="Orientado">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Orientado
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-primary btn-sm notActive" data-toggle="ori_desori" data-title="Desorientado">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Desorientado
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>
                    <input type="hidden" name="ori_desori" id="ori_desori">
                </div>
            </div>
    	</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			<div align="center">
                <br>
                <div  class="input-group">
                    <div id="radioBtn" class="btn-group">
                        <a class="btn btn-primary btn-sm notActive"    data-toggle="hidra_deshidra" data-title="Hidratado">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Hidratado
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="hidra_deshidra" data-title="Deshidratado">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Deshidratado
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </div>
                    <input type="hidden" name="hidra_deshidra" id="hidra_deshidra">
                </div>
            </div>
		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			<div align="center">
                <br>
                <div  class="input-group">
                    <div id="radioBtn" class="btn-group">
                        <a class="btn btn-primary btn-sm notActive"    data-toggle="coloracion" data-title="Coloracion_adecuada">Coloración adecuada</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="coloracion" data-title="Palidez">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Palidez
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>
                    <input type="hidden" name="coloracion" id="coloracion">
                </div>
            </div>
		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			<div align="center">
                <br>
                <div  class="input-group">
                    <div id="radioBtn" class="btn-group">
                        <a class="btn btn-primary btn-sm notActive"    data-toggle="marcha_normal" data-title="Marcha">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Marcha
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="marcha_normal" data-title="Normal">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Normal
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </div>
                    <input type="hidden" name="marcha_normal" id="marcha_normal">
                </div>
            </div>
		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			<div align="center">
                <br>
                <div  class="input-group">
                    <div id="radioBtn" class="btn-group">
                        <a class="btn btn-primary btn-sm notActive"    data-toggle="altMarcha_otrasAlt" data-title="Alta_marcha">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Alt. Marcha
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="altMarcha_otrasAlt" data-title="Otras_alteraciones">
                        &nbsp;&nbsp;
                        Otras alteraciones
                        &nbsp;&nbsp;
                        </a>
                    </div>
                    <input type="hidden" name="altMarcha_otrasAlt" id="altMarcha_otrasAlt">
                </div>
            </div>
		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			<div align="center">
                <br>
                <div  class="input-group">
                    <div id="radioBtn" class="btn-group">
                        <a class="btn btn-primary btn-sm notActive"    data-toggle="otro_iter" data-title="otro">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Otro
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="otro_iter" data-title="icterico">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Ictérico
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </div>
                    <input type="hidden" name="otro_iter" id="otro_iter">
                </div>
            </div>
		</div>
	</div>

</div>

<script>
$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})
</script>