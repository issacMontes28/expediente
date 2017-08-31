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
                <thead><tr><th colspan="2">Doctor</th><th>Cédula</th></tr></thead>
                <tbody><tr><td class="service" colspan="2"></td><td class="service"></td></tr></tbody>
                <thead><tr><th colspan="3">Firma</th></tr></thead>
                <tbody><tr><td class="service" colspan="3"></td></tr></tbody>
              </table>
       <?php

              }
            }
            if ( $info_array[$i] == "Antecedentes_HF") {
              for ($j=0; $j < count($antecedentes_hf_array); $j++) {
       ?>
                <table class="table">
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
                  <thead><tr><th colspan="2">Doctor</th><th>Cédula</th></tr></thead>
                  <tbody><tr><td class="service" colspan="2"></td><td class="service"></td></tr></tbody>
                  <thead><tr><th colspan="3">Firma</th></tr></thead>
                  <tbody><tr><td class="service" colspan="3"></td></tr></tbody>
                </table>
              }
            }
          }
       ?>
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
