	<div>
	<h3 align="center"><strong>Antecedentes del paciente</strong></h3>
    <button name="btnMostrarAHF" data-bind="click: $root.mostrarAHF, visible: visible_AHF() == 0"
        class="btn btn-primary">Mostrar antecedentes heredo familiares</button>
		<button name="btnAgregar" data-bind="click: $root.ocultarAHF, visible: visible_AHF() == 1"
				class="btn btn-danger">Ocultar antecedentes heredo familiares</button>
		<table data-bind="visible: visible_AHF() == 1" class="table">
			<thead>
					 <tr><th>1.-Diabetes</th></tr>
			 </thead>
			 <tbody>
					 <tr>
							 <td><input class="form-control" placeholder="ingrese antecedente" name="diabetes"></input></td>
					 </tr>
			 </tbody>
       <thead>
 					 <tr><th>2.-Hipertensión</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="hipertension"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>3.-Cardiopatía</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="cardiopatia"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>4.-Hepatopatías</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="hepatopatia"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>5.-Nefropatías</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="nefropatia"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>6.-Enfermedades mentales</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="enmen"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>7.-Asma</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="asma"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>8.-Cancer</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="cancer"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>9.-Enfermedades alérgicas</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="enale"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>10.-Enfermedades endócrinas</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="endo"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>11.-Otros</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese antecedente" name="otros"></input></td>
 					 </tr>
 			 </tbody>
       <thead>
 					 <tr><th>12.-Interrogados y negados</th></tr>
 			 </thead>
 			 <tbody>
 					 <tr>
 							 <td><input class="form-control" placeholder="ingrese interrogados y negados" name="ineg"></input></td>
 					 </tr>
 			 </tbody>
		</table>
	</div>
