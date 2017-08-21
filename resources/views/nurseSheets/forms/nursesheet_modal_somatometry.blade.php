<div id="modal_somatometry">
<div class="form-group">
  {!!Form::label('peso_1','Peso (Kg):')!!}
  <input id="peso" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('altura_1','Altura (cm):')!!}
<input id="altura"  type="number" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('parterial_1','Presión arterial sistólica (mm/Hg):')!!}
<input id="psistolica"  type="number" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('parterial_1','Presión arterial diastólica (mm/Hg):')!!}
<input id="pdiastolica"  type="number" class="form-control"></input>
</div>
<div class="form-group">
{!!Form::label('frespiratoria_1','Frecuencia respiratoria:')!!}
<input id="frespiratoria"  type="number" class="form-control"></input>
</div>
<div class="form-group">
  {!!Form::label('pulso_1','Pulso:')!!}
  <input id="pulso"  type="number" class="form-control"></input>
</div>
<div class="form-group">
  {!!Form::label('oximetria_1','Oximetría (% de oxígeno en la sangre):')!!}
  <input id="oximetria"  type="number" class="form-control"></input>
</div>
<div class="form-group">
  {!!Form::label('glucometria_1','Glucometría (mg/dL):')!!}
  <input id="glucometria"  type="number" class="form-control"></input>
</div>
<div class="form-group">
   <button id="btnAgregar2" type="submit" class="btn btn-primary btn-sm" Onclick="modifyPacient();">
   Modificar HDE</button>
</div>
</div>
