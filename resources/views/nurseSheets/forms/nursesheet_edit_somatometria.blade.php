<div class="form-group" id="#tab1">
  <h5 align="center">Somatometría</h5>
  <table class="table">
     <tbody data-bind="foreach: somatometria">
       <tr><th>Peso</th></tr>
       <tr><td><input data-bind="value: peso" class="form-control"></input></td></tr>
       <tr><th>Presión sistólica</th></tr>
       <tr><td><input data-bind="value: psistolica" class="form-control"/></td></tr>
       <tr><th>Presión diastólica</th></tr>
       <tr><td><input data-bind="value: pdiastolica" class="form-control"/></td></tr>
       <tr><th>frecuencia respiratoria</th></tr>
       <tr><td><input data-bind="value: frespiratoria" class="form-control"/></td></tr>
       <tr><th>Oximetría</th></tr>
       <tr><td><input data-bind="value: oximetria" class="form-control"/></td></tr>
       <tr><th>Glucometría</th></tr>
       <tr><td><input data-bind="value: glucometria" class="form-control"/></td></tr>
     </tbody>
  </table>
</div>
