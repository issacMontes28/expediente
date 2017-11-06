<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hoja de registro</title>
    <link rel="stylesheet" type="text/css"><style>
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #5D6975;
      text-decoration: underline;
    }

    body {
      position: relative;
      width: 16cm;
      height: 29.7cm;
      margin: 0 auto;
      color: #001028;
      background: #FFFFFF;
      font-family: Arial, sans-serif;
      font-size: 12px;
      font-family: Arial;
    }

    header {
      padding: 10px 0;
      margin-bottom: 30px;
    }

    #logo {
      text-align: center;
      margin-bottom: 10px;
    }

    #logo img {
      width: 90px;
    }

    h1 {
      color: #5D6975;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      margin: 0 0 0 0;
    }

    #project {
      float: left;
    }

    #project span {
      color: #5D6975;
      text-align: right;
      width: 52px;
      margin-right: 10px;
      display: inline-block;
      font-size: 0.8em;
    }

    #company {
      float: right;
      text-align: right;
    }

    #project div,
    #company div {
      white-space: nowrap;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }

    table tr:nth-child(2n-1) td {
      background: #F5F5F5;
    }

    table th,
    table td {
      text-align: left;
    }

    table th {
      padding: 5px 20px;
      color: #5D6975;
      border-bottom: 1px solid #C1CED9;
      white-space: nowrap;
      font-weight: normal;
	  text-align: left;
    }

    table .service,
    table .desc {
      text-align: left;
    }

    table td {
      padding: 20px;
      text-align: left;
    }

    table td.service,
    table td.desc {
      vertical-align: top;
    }

    table td.unit,
    table td.qty,
    table td.total {
      font-size: 1.2em;
    }

    table td.grand {
      border-top: 1px solid #5D6975;;
    }

    #notices .notice {
      color: #5D6975;
      font-size: 1.2em;
    }

    footer {
      color: #5D6975;
      width: 100%;
      height: 30px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #C1CED9;
      padding: 8px 0;
      text-align: center;
    }
    </style>
  </head>
  <body>


	 <?php
          for ($i=0; $i < count($info_array); $i++) {
            if ( $info_array[$i] == "Datos_personales") {
              for ($j=0; $j < count($datos_personales_array); $j++) {
      ?>

	  		<h1>
				<?php echo $datos_personales_array[$j]["nombre"]?>
				<?php echo $datos_personales_array[$j]["apaterno"]?>
	  			<?php echo $datos_personales_array[$j]["amaterno"]?>
	  		</h1>

	  		<h2>
				Hoja de registro
			</h2>
	  		<hr>
	  <div style="position:absolute;top:10px;right:10px;">
		  <img  src=" {{ asset('assets/img/logo.png') }}"  />
	  </div>

       <?php
              }
            }
		}
       ?>

    <main>
      <?php
          for ($i=0; $i < count($info_array); $i++) {
            if ( $info_array[$i] == "Datos_personales") {
              for ($j=0; $j < count($datos_personales_array); $j++) {
      ?>
              <table class="table">
                <tr><th colspan="3"><h2 align="left">Datos demográficos</h2></th></tr>
                <thead><tr><th>Nombre</th><th>Apellido paterno</th><th>Apellido materno</th></tr></thead>
                <tbody>
                  <tr>
                    <td class="service"><?php echo $datos_personales_array[$j]["nombre"]?></td>
                    <td class="service"><?php echo $datos_personales_array[$j]["apaterno"]?></td>
                    <td class="service"><?php echo $datos_personales_array[$j]["amaterno"]?></td>
                  </tr>
                </tbody>
                <thead><tr><th>Sexo</th><th>Fecha de nacimiento</th><th>CURP</th></tr></thead>
                <tbody><tr><td class="service"><?php echo $datos_personales_array[$j]["sexo"]?></td>
                  <td class="service"><?php echo $datos_personales_array[$j]["fecha_nac"]?></td>
                  <td class="service"><?php echo $datos_personales_array[$j]["curp"]?></td>
                </tr></tbody>
                <thead><tr><th>Nacionalidad</th><th>Calle</th><th>Número exterior</th></tr></thead>
                <tbody><tr>
                  <td class="service"><?php echo $datos_personales_array[$j]["nacionalidad"]?></td>
                  <td class="service"><?php echo $datos_personales_array[$j]["calle"]?></td>
                  <td class="service"><?php echo $datos_personales_array[$j]["num_ext"]?></td>
                </tr></tbody>
                <thead><tr><th>Número interior</th><th>Colonia</th><th>Código postal</th></tr></thead>
                <tbody><tr><td class="service">
                  <?php echo $datos_personales_array[$j]["num_int"]?></td>
                  <td class="service"><?php echo $datos_personales_array[$j]["colonia"]?></td>
                  <td class="service"><?php echo $datos_personales_array[$j]["cp"]?></td>
                </tr></tbody>
                <thead><tr><th>Localidad</th><th>Municipio</th><th>Estado</th></tr></thead>
                <tbody>
                  <tr>
                    <td class="service"><?php echo $datos_personales_array[$j]["localidad"]?></td>
                    <td class="service"><?php echo $datos_personales_array[$j]["municipio"]?></td>
                    <td class="service"><?php echo $datos_personales_array[$j]["estado"]?></td>
                  </tr>
                </tbody>
                <thead><tr><th>Teléfono de casa</th><th>Teléfono celular</th><th>Teléfono de oficina</th></tr></thead>
                <tbody><tr>
                  <td class="service"><?php echo $datos_personales_array[$j]["telefono_casa"]?></td>
                  <td class="service"><?php echo $datos_personales_array[$j]["telefono_celular"]?></td>
                  <td class="service"><?php echo $datos_personales_array[$j]["telefono_oficina"]?></td>
                </tr></tbody>
                <thead><tr><th>Correo</th></tr></thead>
                <tbody><tr><td class="service"><?php echo $datos_personales_array[$j]["correo"]?></td></tr></tbody>
              </table>
       <?php

              }
            }
            if ( $info_array[$i] == "Antecedentes_HF") {
              for ($j=0; $j < count($antecedentes_hf_array); $j++) {
       ?>
                <table class="table">
				  <tr><th colspan="3"><h2 align="left">Antecedentes heredo-familiares</h2></th></tr>
                  <thead><tr><th>Diabetes</th><th>Hipertensión</th><th>Cardiopatía</th></tr></thead>
                  <tbody>
                    <tr>
                      <td class="service"><?php echo $antecedentes_hf_array[$j]["diabetes"]?></td>
                      <td class="service"><?php echo $antecedentes_hf_array[$j]["hipertension"]?></td>
                      <td class="service"><?php echo $antecedentes_hf_array[$j]["cardiopatia"]?></td>
                    </tr>
                  </tbody>
                  <thead><tr><th>Hepatopatía</th><th>Nefropatía</th><th>Enfermedades mentales</th></tr></thead>
                  <tbody><tr><td class="service"><?php echo $antecedentes_hf_array[$j]["hepatopatia"]?></td>
                    <td class="service"><?php echo $antecedentes_hf_array[$j]["nefropatia"]?></td>
                    <td class="service"><?php echo $antecedentes_hf_array[$j]["enmentales"]?></td>
                  </tr></tbody>
                  <thead><tr><th>Asma</th><th>Cancer</th><th>Enfermedades alérgicas</th></tr></thead>
                  <tbody><tr>
                    <td class="service"><?php echo $antecedentes_hf_array[$j]["asma"]?></td>
                    <td class="service"><?php echo $antecedentes_hf_array[$j]["cancer"]?></td>
                    <td class="service"><?php echo $antecedentes_hf_array[$j]["enalergicas"]?></td>
                  </tr></tbody>
                  <thead><tr><th>Enfermedades endócrinas</th><th colspan="2">Otros</th></tr></thead>
                  <tbody><tr><td class="service">
                    <?php echo $antecedentes_hf_array[$j]["endocrinas"]?></td>
                    <td class="service"><?php echo $antecedentes_hf_array[$j]["otros"]?></td>
                  </tr></tbody>
                </table>
      <?php
              }
            }
            if ( $info_array[$i] == "Antecedentes_PP") {
              for ($j=0; $j < count($antecedentes_pp_array); $j++) {
       ?>
                <table class="table">
				  <tr><th colspan="3"><h2 align="left">Antecedentes personales patológicos</h2></th></tr>
                  <thead><tr><th>Enfermedades actuales</th><th>Quirúrgicos</th><th>Transfucionales</th></tr></thead>
                  <tbody>
                    <tr>
                      <td class="service"><?php echo $antecedentes_pp_array[$j]["enactuales"]?></td>
                      <td class="service"><?php echo $antecedentes_pp_array[$j]["quirurjicos"]?></td>
                      <td class="service"><?php echo $antecedentes_pp_array[$j]["transfucionales"]?></td>
                    </tr>
                  </tbody>
                  <thead><tr><th>Alergias</th><th>Traumáticos</th><th>Hospitalizaciones previas</th></tr></thead>
                  <tbody><tr><td class="service"><?php echo $antecedentes_pp_array[$j]["alergias"]?></td>
                    <td class="service"><?php echo $antecedentes_pp_array[$j]["traumaticos"]?></td>
                    <td class="service"><?php echo $antecedentes_pp_array[$j]["hosprevias"]?></td>
                  </tr></tbody>
                  <thead><tr><th>Adicciones</th><th colspan="2">Otros</th></tr></thead>
                  <tbody><tr>
                    <td class="service"><?php echo $antecedentes_pp_array[$j]["adicciones"]?></td>
                    <td class="service"><?php echo $antecedentes_pp_array[$j]["otros"]?></td>
                  </tr></tbody>
                </table>
      <?php
              }
            }
            if ( $info_array[$i] == "Antecedentes_PNP") {
              for ($j=0; $j < count($antecedentes_pnp_array); $j++) {
      ?>
            <table class="table">
			  <tr><th colspan="3"><h2 align="left">Antecedentes personales no patológicos</h2></th></tr>
              <thead><tr><th>Baño</th><th>Dientes</th><th>Habitación</th></tr></thead>
              <tbody>
                <tr>
                  <td class="service"><?php echo $antecedentes_pnp_array[$j]["banio"]?></td>
                  <td class="service"><?php echo $antecedentes_pnp_array[$j]["dientes"]?></td>
                  <td class="service"><?php echo $antecedentes_pnp_array[$j]["habitacion"]?></td>
                </tr>
              </tbody>
              <thead><tr><th>Servicios</th><th>Tabaquismo</th><th>Alcoholismo</th></tr></thead>
              <tbody><tr>
                <td class="service"><?php echo $antecedentes_pnp_array[$j]["servicios"]?>
                <td class="service"><?php echo $antecedentes_pnp_array[$j]["tabaquismo"]?></td>
                <td class="service"><?php echo $antecedentes_pnp_array[$j]["alcoholismo"]?></td>
              </tr></tbody>
              <thead><tr><th>Alimentación</th><th>Deportes</th></tr></thead>
              <tbody><tr>
                <td class="service"><?php echo $antecedentes_pnp_array[$j]["alimentacion"]?></td>
                <td class="service"><?php echo $antecedentes_pnp_array[$j]["deportes"]?></td>
              </tr></tbody>
            </table>
      <?php
            }
           }
           if ( $info_array[$i] == "Antecedentes_GO") {
             for ($j=0; $j < count($antecedentes_go_array); $j++) {
      ?>
            <table class="table">
			  <tr><th colspan="3"><h2 align="left">Antecedentes gineco-obstétricos</h2></th></tr>
              <thead><tr><th>Menarca</th><th>Ritmo menstrual</th><th>Dismenorrea</th></tr></thead>
              <tbody>
                <tr>
                  <td class="service"><?php echo $antecedentes_go_array[$j]["menarca"]?></td>
                  <td class="service"><?php echo $antecedentes_go_array[$j]["rmenstrual"]?></td>
                  <td class="service"><?php echo $antecedentes_go_array[$j]["dismenorrea"]?></td>
                </tr>
              </tbody>
              <thead><tr><th>Inicio de Vida sexual activa</th><th>Parejas</th><th>Gestas</th></tr></thead>
              <tbody><tr><td class="service"><?php echo $antecedentes_go_array[$j]["ivsa"]?></td>
                <td class="service"><?php echo $antecedentes_go_array[$j]["parejas"]?></td>
                <td class="service"><?php echo $antecedentes_go_array[$j]["gestas"]?></td>
              </tr></tbody>
              <thead><tr><th>Abortos</th><th>Partos</th><th>Cesáreas</th></tr></thead>
              <tbody><tr><td class="service"><?php echo $antecedentes_go_array[$j]["abortos"]?></td>
                <td class="service"><?php echo $antecedentes_go_array[$j]["partos"]?></td>
                <td class="service"><?php echo $antecedentes_go_array[$j]["gestas"]?></td>
              </tr></tbody>
              <thead><tr><th>Fecha probable de parto</th><th>Menopausia</th><th>Climaterio</th></tr></thead>
              <tbody><tr><td class="service"><?php echo $antecedentes_go_array[$j]["fpp"]?></td>
                <td class="service"><?php echo $antecedentes_go_array[$j]["menopausia"]?></td>
                <td class="service"><?php echo $antecedentes_go_array[$j]["climaterio"]?></td>
              </tr></tbody>
              <thead><tr><th>Método de planificación familiar</th><th>Citología</th><th>Mastografía</th></tr></thead>
              <tbody><tr><td class="service"><?php echo $antecedentes_go_array[$j]["mpp"]?></td>
                <td class="service"><?php echo $antecedentes_go_array[$j]["citologia"]?></td>
                <td class="service"><?php echo $antecedentes_go_array[$j]["mastografia"]?></td>
              </tr></tbody>
            </table>
      <?php
            }
          }
          if ($info_array[$i] == "Interrogatorio_AS") {
            for ($j=0; $j < count($interrogatorio_as_array); $j++) {
      ?>
            <table class="table">
			  <tr><th colspan="3"><h2 align="left">Interrogatorio por aparatos y sistemas</h2></th></tr>
              <thead><tr><th>Ap. Digestivo</th><th>Ap. Cardiovascular</th><th>Ap. Respiratorio</th></tr></thead>
              <tbody>
                <tr>
                  <td class="service"><?php echo $interrogatorio_as_array[$j]["ap_digestivo"]?></td>
                  <td class="service"><?php echo $interrogatorio_as_array[$j]["ap_cardivascular"]?></td>
                  <td class="service"><?php echo $interrogatorio_as_array[$j]["ap_respiratorio"]?></td>
                </tr>
              </tbody>
              <thead><tr><th>Ap. Urinario</th><th>Ap. Genital</th><th>Ap. Hematológico</th></tr></thead>
              <tbody><tr><td class="service"><?php echo $interrogatorio_as_array[$j]["ap_urinario"]?></td>
                <td class="service"><?php echo $interrogatorio_as_array[$j]["ap_genital"]?></td>
                <td class="service"><?php echo $interrogatorio_as_array[$j]["ap_hematologico"]?></td>
              </tr></tbody>
              <thead><tr><th>Ap. Endócrino</th><th>Ap. Osteomuscular</th><th>Sistema Nervioso</th></tr></thead>
              <tbody><tr><td class="service"><?php echo $interrogatorio_as_array[$j]["ap_endocrino"]?></td>
                <td class="service"><?php echo $interrogatorio_as_array[$j]["ap_osteomuscular"]?></td>
                <td class="service"><?php echo $interrogatorio_as_array[$j]["si_nervioso"]?></td>
              </tr></tbody>
              <thead><tr><th>Sistema Sensorial</th><th>Sistema Psicosomático</th></tr></thead>
              <tbody><tr><td class="service"><?php echo $interrogatorio_as_array[$j]["si_sensorial"]?></td>
                <td class="service"><?php echo $interrogatorio_as_array[$j]["sicosomatico"]?></td>
              </tr></tbody>
            </table>
      <?php
            }
          }
          if ($info_array[$i] == "Sintomas_generales") {
            for ($j=0; $j < count($sintomas_generales_array); $j++) {
      ?>
            <table class="table">
			  <tr><th colspan="3"><h2 align="left">Síntomas generales</h2></th></tr>
              <thead><tr><th>Astenia</th><th>Adinamia</th><th>Anorexia</th></tr></thead>
              <tbody>
                <tr>
                  <td class="service"><?php echo $sintomas_generales_array[$j]["astenia_pacient"]?></td>
                  <td class="service"><?php echo $sintomas_generales_array[$j]["adinamia_pacient"]?></td>
                  <td class="service"><?php echo $sintomas_generales_array[$j]["anorexia_pacient"]?></td>
                </tr>
              </tbody>
              <thead><tr><th>Fiebre</th><th>Pérdida de peso</th><th>Otros</th></tr></thead>
              <tbody><tr><td class="service"><?php echo $sintomas_generales_array[$j]["fiebre_pacient"]?></td>
                <td class="service"><?php echo $sintomas_generales_array[$j]["pPeso_pacient"]?></td>
                <td class="service"><?php echo $sintomas_generales_array[$j]["otrosSI_pacient"]?></td>
              </tr></tbody>
            </table>
      <?php
          }
         }
         if ($info_array[$i] == "Padecimiento_actual") {
           for ($j=0; $j < count($padecimiento_actual_array); $j++) {
        ?>
              <table class="table">
				<tr><th colspan="3"><h2 align="left">Padecimiento actual</h2></th></tr>
                <thead><tr><th>Descripción</th></tr></thead>
                <tbody>
                  <tr>
                    <td class="service"><?php echo $padecimiento_actual_array[$j]["descripcion_pacient"]?></td>
                  </tr>
                </tbody>
              </table>
        <?php
          }
         }
         if ($info_array[$i] == "Somatometria") {
           for ($j=0; $j < count($somatometria_array); $j++) {
        ?>
              <table class="table">
				<tr><th colspan="3"><h2 align="left">Somatometría</h2></th></tr>
                <thead><tr><th>Peso</th><th>Altura</th><th>Presión sistólica</th></tr></thead>
                <tbody>
                  <tr>
                    <td class="service"><?php echo $somatometria_array[$j]["peso"].' kg'?></td>
                    <td class="service"><?php echo $somatometria_array[$j]["altura"].' cm'?></td>
                    <td class="service"><?php echo $somatometria_array[$j]["psistolica"].' mm/Hg'?></td>
                  </tr>
                </tbody>
                <thead><tr><th>Presión diastólica</th><th>Frecuencia respiratoria</th><th>Pulso</th></tr></thead>
                <tbody><tr><td class="service"><?php echo $somatometria_array[$j]["pdiastolica"].' mm/Hg'?></td>
                  <td class="service"><?php echo $somatometria_array[$j]["frespiratoria"].' p/m'?></td>
                  <td class="service"><?php echo $somatometria_array[$j]["pulso"].' p/m'?></td>
                </tr></tbody>
                <thead><tr><th>Oximetría</th><th>Glucometría</th></tr></thead>
                <tbody><tr><td class="service"><?php echo $somatometria_array[$j]["oximetria"].' %'?></td>
                  <td class="service"><?php echo $somatometria_array[$j]["glucometria"].' mg/dL'?></td>
                </tr></tbody>
              </table>
        <?php
          }
         }
         if ($info_array[$i] == "Inspeccion_general") {
           for ($j=0; $j < count($inspeccion_general_array); $j++) {
        ?>
              <table class="table">
				<tr><th colspan="3"><h2 align="left">Inspección general</h2></th></tr>
                <thead><tr><th>Orientación</th><th>Hidratación</th><th>Coloración</th></tr></thead>
                <tbody>
                  <tr>
                    <td class="service"><?php echo $inspeccion_general_array[$j]["ori_desori"]?></td>
                    <td class="service"><?php echo $inspeccion_general_array[$j]["hidra_deshidra"]?></td>
                    <td class="service"><?php echo $inspeccion_general_array[$j]["coloracion"]?></td>
                  </tr>
                </tbody>
                <thead><tr><th>Marcha</th><th>Alteración de la marcha</th><th>Otros</th></tr></thead>
                <tbody><tr><td class="service"><?php echo $inspeccion_general_array[$j]["marcha_normal"]?></td>
                  <td class="service"><?php echo $inspeccion_general_array[$j]["altMarcha_otrasAlt"]?></td>
                  <td class="service"><?php echo $inspeccion_general_array[$j]["otro_iter"]?></td>
                </tr></tbody>
              </table>
       <?php
           }
          }
          if ($info_array[$i] == "Exploracion_fisica") {
            for ($j=0; $j < count($exploracion_fisica_array); $j++) {
        ?>
              <table class="table">
				<tr><th colspan="3"><h2 align="left">Inspección general</h2></th></tr>
                <thead><tr><th>Orientación</th><th>Hidratación</th><th>Coloración</th></tr></thead>
                <tbody>
                  <tr>
                    <td class="service"><?php echo $exploracion_fisica_array[$j]["cabeza_sujeto"]?></td>
                    <td class="service"><?php echo $exploracion_fisica_array[$j]["cuello_sujeto"]?></td>
                    <td class="service"><?php echo $exploracion_fisica_array[$j]["torax_sujeto"]?></td>
                  </tr>
                </tbody>
                <thead><tr><th>Marcha</th><th>Alteración de la marcha</th><th>Otros</th></tr></thead>
                <tbody><tr><td class="service"><?php echo $exploracion_fisica_array[$j]["abdomen_sujeto"]?></td>
                  <td class="service"><?php echo $exploracion_fisica_array[$j]["miembros_sujeto"]?></td>
                  <td class="service"><?php echo $exploracion_fisica_array[$j]["genitales_sujeto"]?></td>
                </tr></tbody>
              </table>
       <?php
          }
         }
        }
       ?>
      <table>
        <thead><tr><th colspan="2">Doctor</th><th>Cédula</th></tr></thead>
        <tbody><tr><td class="service" colspan="2"></td><td class="service"></td></tr></tbody>
        <thead><tr><th colspan="3">Firma</th></tr></thead>
        <tbody><tr><td class="service" colspan="3"></td></tr></tbody>
      </table>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Si hay alguna inconsistecia en sus datos, puede modificarlos.</div>
      </div>
    </main>
    <footer>
      Ésta hoja de registro fue creada en computadora y no es válida sin firma.
    </footer>
  </body>
</html>
