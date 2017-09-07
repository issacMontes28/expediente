<style>
.textarea_css {
  width: 100%;
  height: 100px;
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.07);
  border-color: -moz-use-text-color #FFFFFF #FFFFFF -moz-use-text-color;
  border-image: none;
  border-radius: 6px 6px 6px 6px;
  border-style: none solid solid none;
  border-width: medium 1px 1px medium;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;
  color: #555555;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 1em;
  line-height: 1.4em;
  padding: 5px 8px;
  transition: background-color 0.2s ease 0s;
  margin-top:10px;
  
}

.textarea_css1 {
    outline-width: 0;
    width: 100%;
  height: 100px;
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background: none repeat scroll 0 0 #FFFFFF;
  border-color: -moz-use-text-color #FFFFFF #FFFFFF -moz-use-text-color;
  border-image: none;
  border-radius: 6px 6px 6px 6px;
  border-style: none solid solid none;
  border-width: medium 1px 1px medium;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;
  color: #555555;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 1em;
  line-height: 1.4em;
  padding: 5px 8px;
  transition: background-color 0.2s ease 0s;
  margin-top:10px;
}

.form-group input[type="checkbox"] {
    display: none;
}

.form-group input[type="checkbox"] + .btn-group > label span {
    width: 20px;
}

.form-group input[type="checkbox"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
    display: inline-block;   
}

.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
    display: none;   
}
</style>

<br>


<div  class="row">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
            <input type="checkbox" name="ap_digestivo_check" id="ap_digestivo_check" onclick="ap_digestivo_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="ap_digestivo_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="ap_digestivo_check" class="btn btn-default active">
                    Aparato digestivo:
                </label>
            </div>
            <br>
            <textarea name="ap_digestivo" id="ap_digestivo" ></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="ap_cardivascular_check" id="ap_cardivascular_check"  onclick="ap_cardivascular_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="ap_cardivascular_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="ap_cardivascular_check" class="btn btn-default active">
                    Aparato cardivascular: 
                </label>
            </div>
            <br>
            <textarea name="ap_cardivascular"  id="ap_cardivascular" ></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="ap_respiratorio_check" id="ap_respiratorio_check"  onclick="ap_respiratorio_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="ap_respiratorio_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="ap_respiratorio_check" class="btn btn-default active">
                    Aparato respiratorio:
                </label>
            </div>
            <br>
            <textarea name="ap_respiratorio" id="ap_respiratorio"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="ap_urinario_check" id="ap_urinario_check"  onclick="ap_urinario_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="ap_urinario_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="ap_urinario_check" class="btn btn-default active">
                    Aparato urinario:
                </label>
            </div>
            <br>
            <textarea name="ap_urinario"  id="ap_urinario"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="ap_genital_check" id="ap_genital_check"  onclick="ap_genital_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="ap_genital_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="ap_genital_check" class="btn btn-default active">
                    Aparato genital:
                </label>
            </div>
            <br>
            <textarea name="ap_genital"  id="ap_genital"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="ap_hematologico_check" id="ap_hematologico_check"  onclick="ap_hematologico_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="ap_hematologico_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="ap_hematologico_check" class="btn btn-default active">
                    Aparato hematológico:
                </label>
            </div>
            <br>
            <textarea name="ap_hematologico"   id="ap_hematologico" ></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="ap_endocrino_check" id="ap_endocrino_check"  onclick="ap_endocrino_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="ap_endocrino_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="ap_endocrino_check" class="btn btn-default active">
                    Aparato endocrino:
                </label>
            </div>
            <br>
            <textarea name="ap_endocrino"  id="ap_endocrino"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="ap_osteomuscular_check" id="ap_osteomuscular_check"  onclick="ap_osteomuscular_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="ap_osteomuscular_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="ap_osteomuscular_check" class="btn btn-default active">
                    Aparato osteomuscular:
                </label>
            </div>
            <br>
            <textarea name="ap_osteomuscular" id="ap_osteomuscular"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="si_nervioso_check" id="si_nervioso_check"  onclick="si_nervioso_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="si_nervioso_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="si_nervioso_check" class="btn btn-default active">
                    Sistema nervioso:
                </label>
            </div>
            <br>
            <textarea name="si_nervioso"  id="si_nervioso"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="si_sensorial_check" id="si_sensorial_check" onclick="si_sensorial_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="si_sensorial_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="si_sensorial_check" class="btn btn-default active">
                    Sistema sensorial:
                </label>
            </div>
            <br>
            <textarea name="si_sensorial"  id="si_sensorial" ></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="sicosomatico_check" id="sicosomatico_check" onclick="psicosomatico_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="sicosomatico_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="sicosomatico_check" class="btn btn-default active">
                    Psicosomático:
                </label>
            </div>
            <br>
            <textarea name="sicosomatico"   id="sicosomatico" ></textarea>
        </div>
    </div>

</div>


<script>

    $("#ap_digestivo")      .attr("disabled","disabled");
    $("#ap_digestivo")      .attr("class","textarea_css");

    $("#ap_cardivascular")  .attr("disabled","disabled");
    $("#ap_cardivascular")  .attr("class","textarea_css");

    $("#ap_respiratorio")   .attr("disabled","disabled");
    $("#ap_respiratorio")   .attr("class","textarea_css");
    
    $("#ap_urinario")       .attr("disabled","disabled");
    $("#ap_urinario")       .attr("class","textarea_css");
    
    $("#ap_genital")        .attr("disabled","disabled");
    $("#ap_genital")        .attr("class","textarea_css");
    
    $("#ap_hematologico")   .attr("disabled","disabled");
    $("#ap_hematologico")   .attr("class","textarea_css");
    
    $("#ap_endocrino")      .attr("disabled","disabled");
    $("#ap_endocrino")      .attr("class","textarea_css");
    
    $("#ap_osteomuscular")  .attr("disabled","disabled");
    $("#ap_osteomuscular")  .attr("class","textarea_css");
    
    $("#si_nervioso")       .attr("disabled","disabled");
    $("#si_nervioso")       .attr("class","textarea_css");
    
    $("#si_sensorial")      .attr("disabled","disabled");
    $("#si_sensorial")      .attr("class","textarea_css");
    
    $("#sicosomatico")      .attr("disabled","disabled");
    $("#sicosomatico")      .attr("class","textarea_css");
    
    function ap_digestivo_checkClick(res) {
        if(res.checked == true){
            $("#ap_digestivo").attr("disabled",false);
            $("#ap_digestivo").attr("class","textarea_css1");
        }else{
            $("#ap_digestivo").attr("disabled","disabled");
            $("#ap_digestivo").attr("class","textarea_css");
        }
    }
    
    function ap_cardivascular_checkClick(res) {
        if(res.checked == true){
            $("#ap_cardivascular").attr("disabled",false);
            $("#ap_cardivascular").attr("class","textarea_css1");
        }else{
            $("#ap_cardivascular").attr("disabled","disabled");
            $("#ap_cardivascular").attr("class","textarea_css");
        }
    }

    function ap_respiratorio_checkClick(res) {
        if(res.checked == true){
            $("#ap_respiratorio").attr("disabled",false);
            $("#ap_respiratorio").attr("class","textarea_css1");
        }else{
            $("#ap_respiratorio").attr("disabled","disabled");
            $("#ap_respiratorio").attr("class","textarea_css");
        }
    }

    function ap_urinario_checkClick(res) {
        if(res.checked == true){
            $("#ap_urinario").attr("disabled",false);
            $("#ap_urinario").attr("class","textarea_css1");
        }else{
            $("#ap_urinario").attr("disabled","disabled");
            $("#ap_urinario").attr("class","textarea_css");
        }
    }

    function ap_genital_checkClick(res) {
        if(res.checked == true){
            $("#ap_genital").attr("disabled",false);
            $("#ap_genital").attr("class","textarea_css1");
        }else{
            $("#ap_genital").attr("disabled","disabled");
            $("#ap_genital").attr("class","textarea_css");
        }
    }

    function ap_hematologico_checkClick(res) {
        if(res.checked == true){
            $("#ap_hematologico").attr("disabled",false);
            $("#ap_hematologico").attr("class","textarea_css1");
        }else{
            $("#ap_hematologico").attr("disabled","disabled");
            $("#ap_hematologico").attr("class","textarea_css");
        }
    }

    function ap_endocrino_checkClick(res) {
        if(res.checked == true){
            $("#ap_endocrino").attr("disabled",false);
            $("#ap_endocrino").attr("class","textarea_css1");
        }else{
            $("#ap_endocrino").attr("disabled","disabled");
            $("#ap_endocrino").attr("class","textarea_css");
        }
    }

    function ap_osteomuscular_checkClick(res) {
        if(res.checked == true){
            $("#ap_osteomuscular").attr("disabled",false);
            $("#ap_osteomuscular").attr("class","textarea_css1");
        }else{
            $("#ap_osteomuscular").attr("disabled","disabled");
            $("#ap_osteomuscular").attr("class","textarea_css");
        }
    }

    function si_nervioso_checkClick(res) {
        if(res.checked == true){
            $("#si_nervioso").attr("disabled",false);
            $("#si_nervioso").attr("class","textarea_css1");
        }else{
            $("#si_nervioso").attr("disabled","disabled");
            $("#si_nervioso").attr("class","textarea_css");
        }
    }

    function si_sensorial_checkClick(res) {
        if(res.checked == true){
            $("#si_sensorial").attr("disabled",false);
            $("#si_sensorial").attr("class","textarea_css1");
        }else{
            $("#si_sensorial").attr("disabled","disabled");
            $("#si_sensorial").attr("class","textarea_css");
        }
    }

    function psicosomatico_checkClick(res) {
        if(res.checked == true){
            $("#sicosomatico").attr("disabled",false);
            $("#sicosomatico").attr("class","textarea_css1");
        }else{
            $("#sicosomatico").attr("disabled","disabled");
            $("#sicosomatico").attr("class","textarea_css");
        }
    }


</script>