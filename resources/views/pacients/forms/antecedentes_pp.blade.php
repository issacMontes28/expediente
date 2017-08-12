	<div>
		<button name="btnMostrarAPP" data-bind="click: $root.mostrarAPP, visible: visible_APP() == 0"
				class="btn btn-primary">Mostrar antecedentes personales patológicos</button>
		<button name="btnAgregar" data-bind="click: $root.ocultarAPP, visible: visible_APP() == 1"
				class="btn btn-danger">Ocultar antecedentes personales patológicos</button>
		<table data-bind="visible: visible_APP() == 1" class="table">
			<thead>
					 <tr><th>1.-Enfermedades actuales</th></tr>
			 </thead>
			 <tbody>
					 <tr>
							 <td><input class="form-control" placeholder="ingrese antecedente" name="enac"></input></td>
					 </tr>
			 </tbody>
       <thead>
 					 <tr><th>2.-Quirurjicos</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="quirurjicos"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>3.-Transfucionales</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="transfuncionales"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>4.-Alergias</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="alergias"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>5.-Traumaticos</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="traumaticos"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>6.-Hospitalizaciones previas</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="hospre"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>7.-Adicciones</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="adicciones"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>8.-Otros</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="otrospp"></input></td>
 					 </tr>
 			 </tbody>
		</table>
	</div>
