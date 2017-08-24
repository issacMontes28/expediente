<div id="#tab2">
  <table class="table">
     <tbody data-bind="foreach: habitus">
       <tr><th><h5 align="center">Condición y constitución del paciente</h5></th></tr>
       <tr><th>Condición del paciente</th></tr>
       <tr><td><select data-bind="options: $root.condiciones, value: condicion,
       					optionsCaption: 'Seleccione condición'" class="form-control"></select></td></tr>
       <tr><th>Constitución</th></tr>
       <tr><td><select data-bind="options: $root.constituciones, value: constitucion,
       					optionsCaption: 'Seleccione constitución'" class="form-control"></select></td></tr>
       <tr><th><h5 align="center">Conformación y actitud del paciente</h5></th></tr>
       <tr><th>Entereza</th></tr>
       <tr><td><input data-bind="value: entereza" class="form-control"
       				placeholder='Ingrese observaciones acerca de si faltan partes al cuerpo del paciente'></input></td></tr>
       <tr><th>Relación y proporción</th></tr>
       <tr><td><input data-bind="value: proporcion" class="form-control"
     				placeholder='Ingrese observaciones de la relación y proporción del cuerpo del paciente'></input></td></tr>
       <tr><th>Simetría</th></tr>
       <tr><td><input data-bind="value: simetria" class="form-control"
       				placeholder='Ingrese observaciones en la simetría del cuerpo del paciente'></input></td></tr>
       <tr><th>Biotipo</th></tr>
       <tr><td><select data-bind="options: $root.biotipos, value: biotipo,
       					optionsCaption: 'Seleccione biotipo'" class="form-control"></select></td></tr>
       <tr><th>Actitud</th></tr>
       <tr><td><select data-bind="options: $root.actitudes, value: actitud,
       					optionsCaption: 'Seleccione actitud'" class="form-control"></select></td></tr>
       <tr><th><h5 align="center">Fascies, movimientos y estado de conciencia</h5></th></tr>
       <tr><th>Fascies del paciente</th></tr>
       <tr><td><select data-bind="options: $root.lista_fascies, value: fascies,
       					optionsCaption: 'Seleccione fascies'" class="form-control"></select></td></tr>
       <tr><th>Movimientos anormales</th></tr>
       <tr><td><select data-bind="options: $root.movanormales, value: movanormal,
       					optionsCaption: 'Seleccione movimientos anormales'" class="form-control"></select></td></tr>
       <tr><th>Observaciones</th></tr>
       <tr><td><input data-bind="value: movanormal_obs" class="form-control"
       				placeholder='Ingrese observaciones acerca de los movimientos anormales'></input></td></tr>
       <tr><th>Marchas anormales</th></tr>
       <tr><td><select data-bind="options: $root.marchanormales, value: marchanormal,
       					optionsCaption: 'Seleccione marchas anormales'" class="form-control"></select></td></tr>
     </tbody>
  </table>
</div>
