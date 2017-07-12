<div class="form-group">
<strong>Diagnóstico al cual le asignará un estudio</strong>
<select  class="form-control" data-bind="options: $root.diagnosticos, optionsText: function(item) {
                     return item.nombre()
                 },
                 value: chosenDiagnostic,
                 optionsCaption: 'Elija un diagnóstico...'"></select>
</div>
<br></br>
<div class="form-group">
<strong>Estudio que le asignará al diagnóstico</strong>
<select  class="form-control" data-bind="options: $root.estudios, optionsText: function(item) {
                     return item.nombre()
                 },
                 value: chosenStudy,
                 optionsCaption: 'Elija un estudio...'"></select>
</div>
<div class="form-group">
  <button id="btnAgregar" data-bind="click: $root.agregarMatch"  class="btn btn-success">Agregar Match</button>
</div>
<div class="form-group" data-bind="visible: matches().length > 0">
<h4><strong style="color:#0174DF">Historial de asignación de estudios a diagnósticos</strong></h4>
</div>
<div class="form-group" data-bind="visible: matches().length > 0, foreach: matches">
  <div>
    <h5 style="color:#0431B4"><strong>Nombre del diagnóstico</strong></h5>
    <h5><div data-bind="text: nombre_diagnostico"></div></h5>
    <h5 style="color:#0431B4"><strong>Nombre del estudio</strong></h5>
    <h5><div data-bind="text: nombre_estudio"></div></h5>
    <h5><button data-bind="click: $root.removeNewMatch"  class="btn btn-danger">Quitar</button></h5>
  </div>
  <br></br>
</div>
<div class="form-group" data-bind="visible: matches().length > 0">
  <button id="btnAgregar" data-bind="click: $root.addMatch"  class="btn btn-success">Agregar Matches a la base de datos</button>
</div>
