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

<h4>Exploración regional (<small>Inspección, palpitación, percursión, auscultación, comb,</small>) marca según corresponda y describe</h4>
<br><br>

<div  class="row">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
            <input type="checkbox" name="cabeza_sujeto_check" id="cabeza_sujeto_check" onclick="cabeza_sujeto_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="cabeza_sujeto_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="cabeza_sujeto_check" class="btn btn-default active">
                    Cabeza:
                </label>
            </div>
            <br>
            <textarea name="cabeza_sujeto" id="cabeza_sujeto" ></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="cuello_sujeto_check" id="cuello_sujeto_check"  onclick="cuello_sujeto_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="cuello_sujeto_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="cuello_sujeto_check" class="btn btn-default active">
                    Cuello: 
                </label>
            </div>
            <br>
            <textarea name="cuello_sujeto"  id="cuello_sujeto" ></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="torax_sujeto_check" id="torax_sujeto_check"  onclick="torax_sujeto_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="torax_sujeto_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="torax_sujeto_check" class="btn btn-default active">
                    Torax:
                </label>
            </div>
            <br>
            <textarea name="torax_sujeto" id="torax_sujeto"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="abdomen_sujeto_check" id="abdomen_sujeto_check"  onclick="abdomen_sujeto_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="abdomen_sujeto_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="abdomen_sujeto_check" class="btn btn-default active">
                    Abdomen:
                </label>
            </div>
            <br>
            <textarea name="abdomen_sujeto"  id="abdomen_sujeto"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="miembros_sujeto_check" id="miembros_sujeto_check"  onclick="miembros_sujeto_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="miembros_sujeto_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="miembros_sujeto_check" class="btn btn-default active">
                    Miembros:
                </label>
            </div>
            <br>
            <textarea name="miembros_sujeto"  id="miembros_sujeto"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <input type="checkbox" name="genitales_sujeto_check" id="genitales_sujeto_check"  onclick="genitales_sujeto_checkClick(this)" autocomplete="off" />
            <div class="btn-group">
                <label for="genitales_sujeto_check" class="btn btn-primary">
                    <span class="fa fa-check "></span>
                    <span> </span>
                </label>
                <label for="genitales_sujeto_check" class="btn btn-default active">
                    Genitales:
                </label>
            </div>
            <br>
            <textarea name="genitales_sujeto"   id="genitales_sujeto" ></textarea>
        </div>
    </div>
</div>


<script>

    $("#cabeza_sujeto")      .attr("disabled","disabled");
    $("#cabeza_sujeto")      .attr("class","textarea_css");

    $("#cuello_sujeto")  .attr("disabled","disabled");
    $("#cuello_sujeto")  .attr("class","textarea_css");

    $("#torax_sujeto")   .attr("disabled","disabled");
    $("#torax_sujeto")   .attr("class","textarea_css");
    
    $("#abdomen_sujeto")       .attr("disabled","disabled");
    $("#abdomen_sujeto")       .attr("class","textarea_css");
    
    $("#miembros_sujeto")        .attr("disabled","disabled");
    $("#miembros_sujeto")        .attr("class","textarea_css");
    
    $("#genitales_sujeto")   .attr("disabled","disabled");
    $("#genitales_sujeto")   .attr("class","textarea_css");
    
    
    
    function cabeza_sujeto_checkClick(res) {
        if(res.checked == true){
            $("#cabeza_sujeto").attr("disabled",false);
            $("#cabeza_sujeto").attr("class","textarea_css1");
        }else{
            $("#cabeza_sujeto").attr("disabled","disabled");
            $("#cabeza_sujeto").attr("class","textarea_css");
        }
    }
    
    function cuello_sujeto_checkClick(res) {
        if(res.checked == true){
            $("#cuello_sujeto").attr("disabled",false);
            $("#cuello_sujeto").attr("class","textarea_css1");
        }else{
            $("#cuello_sujeto").attr("disabled","disabled");
            $("#cuello_sujeto").attr("class","textarea_css");
        }
    }

    function torax_sujeto_checkClick(res) {
        if(res.checked == true){
            $("#torax_sujeto").attr("disabled",false);
            $("#torax_sujeto").attr("class","textarea_css1");
        }else{
            $("#torax_sujeto").attr("disabled","disabled");
            $("#torax_sujeto").attr("class","textarea_css");
        }
    }

    function abdomen_sujeto_checkClick(res) {
        if(res.checked == true){
            $("#abdomen_sujeto").attr("disabled",false);
            $("#abdomen_sujeto").attr("class","textarea_css1");
        }else{
            $("#abdomen_sujeto").attr("disabled","disabled");
            $("#abdomen_sujeto").attr("class","textarea_css");
        }
    }

    function miembros_sujeto_checkClick(res) {
        if(res.checked == true){
            $("#miembros_sujeto").attr("disabled",false);
            $("#miembros_sujeto").attr("class","textarea_css1");
        }else{
            $("#miembros_sujeto").attr("disabled","disabled");
            $("#miembros_sujeto").attr("class","textarea_css");
        }
    }

    function genitales_sujeto_checkClick(res) {
        if(res.checked == true){
            $("#genitales_sujeto").attr("disabled",false);
            $("#genitales_sujeto").attr("class","textarea_css1");
        }else{
            $("#genitales_sujeto").attr("disabled","disabled");
            $("#genitales_sujeto").attr("class","textarea_css");
        }
    }


</script>