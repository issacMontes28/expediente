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
            <input type="checkbox" name="astenia_pacient_check" id="astenia_pacient_check" onclick="astenia_pacient_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="astenia_pacient_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="astenia_pacient_check" class="btn btn-default active">
                    Astenia
                </label>
            </div>
            <br>
            <textarea name="astenia_pacient" id="astenia_pacient" ></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="adinamia_pacient_check" id="adinamia_pacient_check"  onclick="adinamia_pacient_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="adinamia_pacient_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="adinamia_pacient_check" class="btn btn-default active">
                    Adinamia: 
                </label>
            </div>
            <br>
            <textarea name="adinamia_pacient"  id="adinamia_pacient" ></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="anorexia_pacient_check" id="anorexia_pacient_check"  onclick="anorexia_pacient_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="anorexia_pacient_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="anorexia_pacient_check" class="btn btn-default active">
                    Anorexia:
                </label>
            </div>
            <br>
            <textarea name="anorexia_pacient" id="anorexia_pacient"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="fiebre_pacient_check" id="fiebre_pacient_check"  onclick="fiebre_pacient_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="fiebre_pacient_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="fiebre_pacient_check" class="btn btn-default active">
                    Fiebre:
                </label>
            </div>
            <br>
            <textarea name="fiebre_pacient"  id="fiebre_pacient"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="pPeso_pacient_check" id="pPeso_pacient_check"  onclick="pPeso_pacient_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="pPeso_pacient_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="pPeso_pacient_check" class="btn btn-default active">
                    Pérdida de peso:
                </label>
            </div>
            <br>
            <textarea name="pPeso_pacient"  id="pPeso_pacient"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="otrosSI_pacient_check" id="otrosSI_pacient_check"  onclick="otrosSI_pacient_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="otrosSI_pacient_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="otrosSI_pacient_check" class="btn btn-default active">
                    Aparato hematológico:
                </label>
            </div>
            <br>
            <textarea name="otrosSI_pacient"   id="otrosSI_pacient" ></textarea>
        </div>
    </div>


</div>


<script>

    $("#astenia_pacient")      .attr("disabled","disabled");
    $("#astenia_pacient")      .attr("class","textarea_css");

    $("#adinamia_pacient")  .attr("disabled","disabled");
    $("#adinamia_pacient")  .attr("class","textarea_css");

    $("#anorexia_pacient")   .attr("disabled","disabled");
    $("#anorexia_pacient")   .attr("class","textarea_css");
    
    $("#fiebre_pacient")       .attr("disabled","disabled");
    $("#fiebre_pacient")       .attr("class","textarea_css");
    
    $("#pPeso_pacient")        .attr("disabled","disabled");
    $("#pPeso_pacient")        .attr("class","textarea_css");

    $("#otrosSI_pacient")        .attr("disabled","disabled");
    $("#otrosSI_pacient")        .attr("class","textarea_css");
    
    
    function astenia_pacient_checkClick(res) {
        if(res.checked == true){
            $("#astenia_pacient").attr("disabled",false);
            $("#astenia_pacient").attr("class","textarea_css1");
        }else{
            $("#astenia_pacient").attr("disabled","disabled");
            $("#astenia_pacient").attr("class","textarea_css");
        }
    }
    
    function adinamia_pacient_checkClick(res) {
        if(res.checked == true){
            $("#adinamia_pacient").attr("disabled",false);
            $("#adinamia_pacient").attr("class","textarea_css1");
        }else{
            $("#adinamia_pacient").attr("disabled","disabled");
            $("#adinamia_pacient").attr("class","textarea_css");
        }
    }

    function anorexia_pacient_checkClick(res) {
        if(res.checked == true){
            $("#anorexia_pacient").attr("disabled",false);
            $("#anorexia_pacient").attr("class","textarea_css1");
        }else{
            $("#anorexia_pacient").attr("disabled","disabled");
            $("#anorexia_pacient").attr("class","textarea_css");
        }
    }

    function fiebre_pacient_checkClick(res) {
        if(res.checked == true){
            $("#fiebre_pacient").attr("disabled",false);
            $("#fiebre_pacient").attr("class","textarea_css1");
        }else{
            $("#fiebre_pacient").attr("disabled","disabled");
            $("#fiebre_pacient").attr("class","textarea_css");
        }
    }

    function pPeso_pacient_checkClick(res) {
        if(res.checked == true){
            $("#pPeso_pacient").attr("disabled",false);
            $("#pPeso_pacient").attr("class","textarea_css1");
        }else{
            $("#pPeso_pacient").attr("disabled","disabled");
            $("#pPeso_pacient").attr("class","textarea_css");
        }
    }

    function otrosSI_pacient_checkClick(res) {
        if(res.checked == true){
            $("#otrosSI_pacient").attr("disabled",false);
            $("#otrosSI_pacient").attr("class","textarea_css1");
        }else{
            $("#otrosSI_pacient").attr("disabled","disabled");
            $("#otrosSI_pacient").attr("class","textarea_css");
        }
    }


</script>