<div>
	<button name="btnMostrarAPP" data-bind="click: $root.mostrarAPNP, visible: visible_APNP() == 0"
			class="btn btn-primary">Mostrar antecedentes personales no patológicos</button>
	<button name="btnAgregar" data-bind="click: $root.ocultarAPNP, visible: visible_APNP() == 1"
			class="btn btn-danger">Ocultar antecedentes personales no patológicos</button>
	<table data-bind="visible: visible_APNP() == 1" class="table">
			<thead>
					 <tr><th>1.-Baño</th></tr>
			 </thead>
			 <tbody>
					 <tr>
							 <td>
								 <label class="radio-inline"><input type="radio" name="banio">Diario</label>
								 <label class="radio-inline"><input type="radio" name="banio">C/3er día</label>
								 <label class="radio-inline"><input type="radio" name="banio">Irregular</label>
							 </td>
					 </tr>
			 </tbody>
       <thead>
 					 <tr><th>2.-Lavado de dientes</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td>
								 <label class="radio-inline"><input type="radio" name="lavado">1/Día</label>
								 <label class="radio-inline"><input type="radio" name="lavado">2/Día</label>
								 <label class="radio-inline"><input type="radio" name="lavado">3/Día</label>
							 </td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>3. Habitación</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td>
								 <label class="radio-inline"><input type="radio" name="habitacion">Urbana</label>
								 <label class="radio-inline"><input type="radio" name="habitacion">Rural</label>
								 <label class="radio-inline"><input type="radio" name="habitacion">Todos los servicios</label>
								 <label class="radio-inline"><input type="radio" name="habitacion">Letrina</label>
							 </td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>4.-Tabaquismo</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td>
								 <input class="form-control" placeholder="ingrese antecedente" name="tabaquismo"></input>
							 </td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>5.-Alcoholismo</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="alcoholismo"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>6.-Alimentación</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="alimentacion"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>7.-Deportes</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="deportes"></input></td>
 					 </tr>
 			 </tbody>
		</table>
	</div>
