	<div>
    <button id="btnAgregarTablaHD" data-bind="click: $root.tabla, visible: visible_btnTabla() == 0"
        class="btn btn-primary">Mostrar antecedentes Gineco-Obstétricos</button>
		<button id="btnAgregar" data-bind="click: $root.tabla_ocultar, visible: visible_btnTabla() == 1"
				class="btn btn-danger">Ocultar antecedentes Gineco-Obstétricos</button>
		<table data-bind="visible: visible_btnTabla() == 1" class="table">
			<thead>
					 <tr><th>1.-Menarca</th></tr>
			 </thead>
			 <tbody>
					 <tr>
							 <td><input class="form-control" placeholder="ingrese antecedente" id="menarca"></input></td>
					 </tr>
			 </tbody>
       <thead>
 					 <tr><th>2.-Quirurjicos</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>3.-Transfucionales</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>4.-Alergias</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>5.-Traumaticos</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>6.-Enfermedades mentales</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>7.-Adicciones</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>8.-Otros</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente"></input></td>
 					 </tr>
 			 </tbody>
		</table>
	</div>
