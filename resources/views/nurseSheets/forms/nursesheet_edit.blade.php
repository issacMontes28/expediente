<div>
<h4 align="center">Datos de la hoja de enfermería para <?php echo $info["paciente"]; ?></h4>
</div>
<div class="form-group">
  <table>
    <thead>
       <tr><th colspan="2"><h4 align="center">Lista de diagnósticos iniciales previos</h4></th></tr>
       <tr><th>Folio de diagnóstico</th><th>Nombre</th></tr>
      </thead>
      <tbody data-bind="foreach: { data: diagnosticos_previos, as: 'diagnostico' }">
          <tr data-bind=" if: diagnostico.tipo()=='Inicial' ">
              <td><input data-bind="value: diagnostico.id()" disabled ></input></td>
              <td><input data-bind="value: diagnostico.nombre()" disabled ></input></td>
          </tr>
      </tbody>
  </table>
</div>
