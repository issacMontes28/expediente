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
      border-top: 1px solid  #5D6975;
      border-bottom: 1px solid  #5D6975;
      color: #5D6975;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: center;
      margin: 0 0 20px 0;
      background-image: url("imagenes_menu/dimension.png");
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
      text-align: center;
    }

    table th {
      padding: 5px 20px;
      color: #5D6975;
      border-bottom: 1px solid #C1CED9;
      white-space: nowrap;
      font-weight: normal;
    }

    table .service,
    table .desc {
      text-align: left;
    }

    table td {
      padding: 20px;
      text-align: right;
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
    <header class="clearfix">
      <div id="logo">
        <img src="img/logo.png">
      </div>
      <h1>Hoja de registro</h1>
    </header>
    <main>
      <?php
          for ($i=0; $i < count($info_array); $i++) {
            if ( $info_array[$i] == "Datos_personales") {
              for ($j=0; $j < count($datos_personales_array); $j++) {
      ?>
              <table class="table">
                <thead><tr><th colspan="3">Datos demográficos</th></tr></thead>
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
                  <thead><tr><th colspan="3">Antecedentes heredo-familiares</th></tr></thead>
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
                  <thead><tr><th colspan="3">Antecedentes personales patológicos</th></tr></thead>
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
              <thead><tr><th colspan="3">Antecedentes personales no patológicos</th></tr></thead>
              <thead><tr><th>Baño</th><th>Dientes</th><th>Habitación</th></tr></thead>
              <tbody>
                <tr>
                  <td class="service"><?php echo $antecedentes_pnp_array[$j]["banio"]?></td>
                  <td class="service"><?php echo $antecedentes_pnp_array[$j]["dientes"]?></td>
                  <td class="service"><?php echo $antecedentes_pnp_array[$j]["habitacion"]?></td>
                </tr>
              </tbody>
              <thead><tr><th>Tabaquismo</th><th>Alcoholismo</th><th>Alimentación</th></tr></thead>
              <tbody><tr><td class="service"><?php echo $antecedentes_pnp_array[$j]["tabaquismo"]?></td>
                <td class="service"><?php echo $antecedentes_pnp_array[$j]["alcoholismo"]?></td>
                <td class="service"><?php echo $antecedentes_pnp_array[$j]["alimentacion"]?></td>
              </tr></tbody>
              <thead><tr><th>Deportes</th></tr></thead>
              <tbody><tr>
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
              <thead><tr><th colspan="3">Antecedentes gineco-obstétricos</th></tr></thead>
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
