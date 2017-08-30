<br>
<div  class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('nombre_1','Nombre:')!!}
{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingrese nombre de nuevo paciente'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('apaterno_1','Primer apellido:')!!}
{!!Form::text('apaterno',null,['class'=>'form-control', 'placeholder'=>'Ingrese apellido paterno de paciente'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('amaterno_1','Segundo apellido:')!!}
{!!Form::text('amaterno',null,['class'=>'form-control', 'placeholder'=>'Ingrese apellido materno de paciente'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
  {!!Form::label('sexo_1','Sexo:')!!}
  <select name="sexo" placeholder="Seleccione nacionalidad"  data-live-search="true" class="selectpicker form-control">
    <option value="H">Masculino</option>
    <option value="F">Femenino</option>
  </select>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('fecha_nac_1','Fecha de nacimiento:')!!}
{!!Form::date('fecha_nac',null,['class'=>'form-control', 'placeholder'=>'Ingrese fecha de nacimiento de paciente'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('curp_1','CURP:')!!}
{!!Form::text('curp',null,['class'=>'form-control', 'placeholder'=>'Ingrese CURP de paciente'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
{!!Form::label('estadocivil_1','Estado civil:')!!}
<select name="estadocivil"  class="form-control selectpicker" data-live-search="true" >
  <option value="Soltero(a)"   >Soltero(a)    </option>
  <option value="Casado(a)"    >Casado(a)     </option>
  <option value="Divorciado(a)">Divorciado(a) </option>
  <option value="Viudo(a)"     >Viudo(a)      </option>
  <option value="Unión libre"  >Unión libre   </option>
</select>
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
{!!Form::label('nacionalidad_1','Nacionalidad:')!!}
<select name="nacionalidad" placeholder="Seleccione nacionalidad"  class="form-control selectpicker" data-live-search="true">
  <?php foreach ($nationalities as $nationality) { ?>
  <option value="<?php echo $nationality->CVE_NAC ?>"><?php echo $nationality->pais;?></option>
  <?php } ?>
</select>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('estado_1','Estado de recidencia:')!!}
{!!Form::select('estado',$states,null,['id'=>'state','placeholder'=>'Seleccione un estado'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('municipio_1','Municipio:')!!}
{!!Form::select('municipio',['placeholder'=>'Seleccione un municipio','class'=>'selectpicker show-tick form-control', 'data-live-search'=>'true'],null,['id'=>'town'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('localidad_1','localidad:')!!}
{!!Form::select('localidad',['placeholder'=>'Seleccione una localidad','class'=>'selectpicker show-tick form-control', 'data-live-search'=>'true'],null,['id'=>'locality'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('cp_1','Código postal (opcional):')!!}
{!!Form::text('cp',null,['class'=>'form-control', 'placeholder'=>'Ingrese código postal'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('colonia_1','Colonia:')!!}
{!!Form::text('colonia',null,['class'=>'form-control', 'placeholder'=>'Ingrese colonia'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('calle_1','Calle:')!!}
{!!Form::text('calle',null,['class'=>'form-control', 'placeholder'=>'Ingrese la calle del domicilio del paciente'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('num_ext_1','Número exterior:')!!}
{!!Form::number('num_ext',null,['class'=>'form-control', 'placeholder'=>'Número exterior'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('num_int_1','Número interior (opcional):')!!}
{!!Form::number('num_int',null,['class'=>'form-control', 'placeholder'=>'Número interior'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('telefono_casa_1','Telefono de casa (opcional):')!!}
{!!Form::number('telefono_casa',null,['class'=>'form-control', 'placeholder'=>'Ingrese telefono de casa'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('telefono_celular_1','Telefono celular (opcional):')!!}
{!!Form::number('telefono_celular',null,['class'=>'form-control', 'placeholder'=>'Ingrese telefono celular'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('telefono_oficina_1','Telefono de oficina (opcional):')!!}
{!!Form::number('telefono_oficina',null,['class'=>'form-control', 'placeholder'=>'Ingrese telefono de oficina'])!!}
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('correo_1','Correo (opcional):')!!}
{!!Form::email('correo',null,['class'=>'form-control', 'placeholder'=>'Ingrese correo del paciente'])!!}
</div>
</div>
