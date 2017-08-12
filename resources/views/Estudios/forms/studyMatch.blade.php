<div class="form-group">
<strong>Primera letra de diagnóstico</strong>
<select id="letra_diagnostico" class="form-control">
  <option selected>Elija letra</option>
  <option>A</option><option>B</option><option>C</option><option>D</option><option>E</option>
  <option>F</option><option>G</option><option>H</option><option>I</option><option>J</option>
  <option>K</option><option>L</option><option>M</option><option>N</option><option>Ñ</option>
  <option>O</option><option>P</option><option>Q</option><option>R</option><option>S</option>
  <option>T</option><option>U</option><option>V</option><option>W</option><option>X</option>
  <option>Y</option><option>Z</option>
</select>
</div>
<div class="form-group">
<strong>Diagnóstico al cual le asignará un estudio</strong>
<select id="diagnosticos" class="form-control"></select>
</div>
<div class="form-group">
<strong>Primera letra de estudio</strong>
<select id="letra_estudio" class="form-control">
<option selected>Elija letra</option>
<option>A</option><option>B</option><option>C</option><option>D</option><option>E</option>
<option>F</option><option>G</option><option>H</option><option>I</option><option>J</option>
<option>K</option><option>L</option><option>M</option><option>N</option><option>Ñ</option>
<option>O</option><option>P</option><option>Q</option><option>R</option><option>S</option>
<option>T</option><option>U</option><option>V</option><option>W</option><option>X</option>
<option>Y</option><option>Z</option>
</select>
</div>
<div class="form-group">
<strong>Estudio que le asignará al diagnóstico</strong>
<select id="estudios" class="form-control"></select>
</div>
<div class="form-group">
<strong>Propósito del estudio</strong>
<textarea id="proposito" class="form-control"></textarea>
</div>
<div class="form-group">
<strong>Metodología usada en el estudio</strong>
<textarea id="metodologia" class="form-control"></textarea>
</div>
<div class="form-group">
<button id="btnAgregar2" data-bind="click: $root.agregarMatch"  class="btn btn-success">
  Agregar match</button>
</div>
<table>
<div class="form-group">
  <table data-bind="visible: matches().length > 0">
    <thead>
     <tr><th colspan="4"><h4 align="center">Lista de diagnósticos matches hechos al momento</h4></th></tr>
     <tr><th>Diagnóstico</th><th>Estudio</th><th>Propósito</th><th>Metodología</th><th>Acción</th></tr>
    </thead>
    <tbody data-bind="foreach: { data: matches, as: 'match' }">
      <tr>
        <td><input data-bind="value: match.nombre_diagnostico()" disabled ></input></td>
        <td><input data-bind="value: match.nombre_estudio()" disabled ></input></td>
        <td><input data-bind="value: match.proposito()" disabled ></input></td>
        <td><input data-bind="value: match.metodologia()" disabled ></input></td>
        <td><button data-bind="click: $root.removeNewMatch" class="btn btn-danger btn-sm"
          >Quitar</button></td>
      </tr>
    </tbody>
  </table>
</div>
</table>
<br></br><br></br>
<div class="form-group" data-bind="visible: matches().length > 0">
  <button id="btnAgregar" data-bind="click: $root.addMatch"  class="btn btn-success">
    Agregar Matches a la base de datos</button>
</div>
