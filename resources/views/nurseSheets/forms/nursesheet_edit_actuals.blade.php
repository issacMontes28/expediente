<div id="tab3">
  <table class="table">
     <tbody data-bind="foreach: actuals">
       <tr><th>Medicamento administrado</th></tr>
       <tr><td><input data-bind="value: nombre_medicamento" class="form-control"
         placeholder='Ingrese nombre de medicamento'></input></td></tr>
       <tr><th>Vía de administración</th></tr>
       <tr><td><select data-bind="options: $root.vias,
                  value: via" class="form-control"></select></td></tr>
     </tbody>
  </table>
</div>
