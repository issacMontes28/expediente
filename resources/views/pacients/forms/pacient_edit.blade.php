<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('nombre_1','Nombre:')!!}
{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingrese nombre de nuevo paciente'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('apaterno_1','Primer apellido:')!!}
{!!Form::text('apaterno',null,['class'=>'form-control', 'placeholder'=>'Ingrese apellido paterno de paciente'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('amaterno_1','Segundo apellido:')!!}
{!!Form::text('amaterno',null,['class'=>'form-control', 'placeholder'=>'Ingrese apellido materno de paciente'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('sexo_1','Sexo:')!!}
<select name="sexo">
  <option value="<?php echo $pacient->sexo ?>"><?php
    if ($pacient->sexo == "H") {
      echo "Masculino" ;
    }
    else {
      echo "Femenino" ;
    }
    ?>
  </option>
  <option value="H">Masculino</option>
  <option value="M">Femenino</option>
</select>
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('curp_1','CURP:')!!}
{!!Form::text('curp',null,['class'=>'form-control', 'placeholder'=>'Ingrese CURP de paciente'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('fecha_nac_1','Fecha de nacimiento:')!!}
{!!Form::date('fecha_nac',null,['class'=>'form-control', 'placeholder'=>'Ingrese fecha de nacimiento de paciente'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('nacionalidad_1','Nacionalidad:')!!}
<select name="nacionalidad" placeholder="Seleccione nacionalidad">
  <option value="<?php echo $pacient->nacionalidad ?>"><?php echo $nac; ?></option>
  <?php foreach ($nationalities as $nationality) { ?>
    <option value="<?php echo $nationality->CVE_NAC ?>"><?php echo $nationality->pais;?></option>
  <?php } ?>
</select>
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('estado_1','Estado de recidencia:')!!}
<select name="estado" id="state" placeholder="Seleccione estado">
  <option value="<?php echo $pacient->estado ?>"><?php echo $ent; ?></option>
  <?php foreach ($states as $state) { ?>
    <option value="<?php echo $state->CVE_ENT ?>"><?php echo $state->NOM_ENT;?></option>
  <?php } ?>
</select>
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('municipio_1','Municipio:')!!}
<select name="municipio" id="town" placeholder="Seleccione municipio">
  <option value="<?php echo $pacient->municipio ?>"><?php echo $mun; ?></option>
</select>
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('localidad_1','localidad:')!!}
<select name="locality" id="locality" placeholder="Seleccione localidad">
  <option value="<?php echo $pacient->localidad ?>"><?php echo $loc; ?></option>
</select>
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('cp_1','Código postal (opcional):')!!}
{!!Form::text('cp',null,['class'=>'form-control', 'placeholder'=>'Ingrese código postal'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('colonia_1','Colonia:')!!}
{!!Form::text('colonia',null,['class'=>'form-control', 'placeholder'=>'Ingrese colonia'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('calle_1','Calle:')!!}
{!!Form::text('calle',null,['class'=>'form-control', 'placeholder'=>'Ingrese la calle del domicilio del paciente'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('num_ext_1','Número exterior:')!!}
{!!Form::number('num_ext',null,['class'=>'form-control', 'placeholder'=>'Número exterior'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('num_int_1','Número interior (opcional):')!!}
{!!Form::number('num_int',null,['class'=>'form-control', 'placeholder'=>'Número interior'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('telefono_casa_1','Telefono de casa (opcional):')!!}
{!!Form::number('telefono_casa',null,['class'=>'form-control', 'placeholder'=>'Ingrese telefono de casa'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('telefono_celular_1','Telefono celular (opcional):')!!}
{!!Form::number('telefono_celular',null,['class'=>'form-control', 'placeholder'=>'Ingrese telefono celular'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('telefono_oficina_1','Telefono de oficina (opcional):')!!}
{!!Form::number('telefono_oficina',null,['class'=>'form-control', 'placeholder'=>'Ingrese telefono de oficina'])!!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!!Form::label('correo_1','Correo (opcional):')!!}
{!!Form::email('correo',null,['class'=>'form-control', 'placeholder'=>'Ingrese correo del paciente'])!!}
</div>
