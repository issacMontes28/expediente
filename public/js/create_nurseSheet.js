//Función  que crea objetos de tipo Medicamento, los cuáles se guardan en un arreglo para guardarse
//después en la base de datos.
function Medicamento(elemento){
 this.nombre_medicamento=ko.observable(elemento.nombre_medicamento);
 this.fecha_admin=ko.observable(elemento.fecha_admin);
 this.cantidad=ko.observable(elemento.cantidad);
 this.via=ko.observable(elemento.via);
}

function Paciente(elemento){
 this.id_paciente=ko.observable(elemento.id_paciente);
 this.nombre=ko.observable(elemento.nombre);
}

function Habitus(elemento){
  this.condicion = ko.observable(elemento.condicion);
  this.constitucion = ko.observable(elemento.constitucion);
  this.entereza = ko.observable(elemento.entereza);
  this.proporcion = ko.observable(elemento.proporcion);
  this.simetria = ko.observable(elemento.simetria);
  this.biotipo = ko.observable(elemento.biotipo);
  this.actitud = ko.observable(elemento.actitud);
  this.fascies=ko.observable(elemento.fascies);
  this.movanormal = ko.observable(elemento.movanormal);
  this.movanormal_obs = ko.observable(elemento.movanormal_obs);
  this.marchanormal = ko.observable(elemento.marchanormal);
}

function Somatometria(elemento){
  this.fecha = ko.observable(elemento.fecha)
  this.peso = ko.observable(elemento.peso);
  this.altura = ko.observable(elemento.altura);
  this.psistolica = ko.observable(elemento.psistolica);
  this.pdiastolica = ko.observable(elemento.pdiastolica);
  this.frespiratoria = ko.observable(elemento.frespiratoria);
  this.pulso = ko.observable(elemento.pulso);
  this.oximetria = ko.observable(elemento.oximetria);
  this.glucometria = ko.observable(elemento.glucometria);
}

function MedActual(elemento){
 this.nombre_med=ko.observable(elemento.nombre_med);
 this.via=ko.observable(elemento.via);
}

//La función appViewModel es la clase principal desde la cual se realizan todas
//las operaciones pertinentes.
function appViewModel(){

  // se utiliza la variable self para evitar causar conflictos en el compilador.
  // hace referencia a los atrubutos de la clase appViewModel.
	var self=this;

  //Variables para la somatometría
  self.peso = ko.observable();
  self.altura = ko.observable();
  self.psistolica = ko.observable();
  self.pdiastolica = ko.observable();
  self.frespiratoria = ko.observable();
  self.pulso = ko.observable();
  self.oximetria = ko.observable();
  self.glucometria = ko.observable();
  self.prueba = ko.observable(1);

  //Arreglos para el habitus
  self.condiciones = ko.observableArray(['Ambulante','Encamado']);
  self.constituciones = ko.observableArray(['Débil','Fuerte','Fuerte debilitado','Media']);
  self.biotipos = ko.observableArray(['Ectomorfo','Endomorfo','Mesomorfo']);
  self.actitudes = ko.observableArray(['Forzada','Instintiva','Libremente escogida','Pasiva']);
  self.movanormales = ko.observableArray(['Convulsiones','Fasciculaciones','Hemibalismo','Tics',
  'Movimientos atetósicos','Movimientos coreicos','Movimientos corfológicos','Movimientos distónicos',
  'Movimientos parkinsonianos','Temblores']);
  self.marchanormales = ko.observableArray(['Marcha atáxica','Marcha claudicante','Marcha espástica',
  'Marcha helicópoda','Marcha miopática','Marcha parkinsoniana',
  'Marcha polineurítica','Marcha titubeante']);
  self.actitudes = ko.observableArray(['Libremente escogida','Instintiva','Forzada','Pasiva']);
  self.vias = ko.observableArray(['Inhalatoria','Intramuscular','Intranasal','Intravenosa',
  'Oftálmica','Ótica','Oral','Parental','Rectal','Subcutánea','Sublingual','Tópica','Transdérmica','Vaginal']);
  self.lista_fascies=ko.observableArray(['No característica','Febril(voluptuosa)','Tifica','Leonina',
  'Adissoniana','Hipocrática','Lúpica','Cushiniana','Hipertiroidea','Tetánica','Mixedematosa','Parkinsoniana',
  'Peritoneal','Adenoidea','Mongólica','Nefrótica']);
  self.nuevo_medicamento = ko.observableArray([]);
  self.nuevo_medicamento_actual = ko.observableArray([]);
  self.nuevo_habitus = ko.observableArray([]);
  self.somatometrias_previas = ko.observableArray([]);
  self.somatometrias_previas2 = ko.observableArray([]);
  self.Paciente = ko.observableArray([]);
  self.visible_btnGrafica = ko.observable(0);
  self.visible_btnTabla = ko.observable(0);


  //Función que lee el archivo en formato json que contiene los clientes guardados en la base de datos.
  $.getJSON('../../json/somatometrias.json',function(result){
    //el método map pasa cada cliente que lee de la base de datos a un arreglo temporal.
     var somatometriasArreglo= $.map(result,function(item){
      return new Somatometria(item);
     });
     //los clientes se cargan en el arreglo que se mostrará en el <select></select>
     self.somatometrias_previas(somatometriasArreglo);
  });

  //Función que lee el archivo en formato json que contiene los clientes guardados en la base de datos.
  $.getJSON('../../json/somatometrias2.json',function(result){
    //el método map pasa cada cliente que lee de la base de datos a un arreglo temporal.
     var somatometriasArreglo= $.map(result,function(item){
      return new Somatometria(item);
     });
     //los clientes se cargan en el arreglo que se mostrará en el <select></select>
     self.somatometrias_previas2(somatometriasArreglo);
  });

  //Función que lee el archivo en formato json que contiene el paciente al que se le asignará la HDE.
  $.getJSON('../../json/pacientehde.json',function(result){
    //el método map pasa cada cliente que lee de la base de datos a un arreglo temporal.
     var pacienteArreglo= $.map(result,function(item){
      return new Paciente(item);
     });
     self.Paciente(pacienteArreglo);
  });

  self.tabla = function(){ self.visible_btnTabla(1); }
  self.tabla_ocultar = function(){ self.visible_btnTabla(0); }
  self.graficas_ocultar = function(){ self.visible_btnGrafica(0); }
  self.grafica = function(){
     var tam = self.somatometrias_previas2().length;
     if (tam > 0) {
       self.visible_btnGrafica(1);
       //Se crea la gráfica
       chart = new Highcharts.Chart({
         chart: {
           renderTo: 'contenedor', 	// Le doy el nombre a la gráfica
           defaultSeriesType: 'line'	// Pongo que tipo de gráfica es
         },
         title: {
           text: 'Registros previos de peso'
         },
         subtitle: {
           text: (function() {
                   var text = 'Paciente: ';
                   var data_paciente = self.Paciente()[0].nombre();
                   var text_final = text.concat(data_paciente);
                   return text_final;
               })()
         },
         xAxis: {
            categories: (function() {
                    // generate an array of random data
                    var data_peso = [];
                    var tam2 = tam - 1;
                      for(var i = tam2; i >= 0; i--){
                         data_peso.push([self.somatometrias_previas2()[i].fecha()]);
                      }
                    return data_peso;
                })(),
           // Pongo el título para el eje de las 'X'
           title: {
             text: 'Fecha en la que se pesó a paciente (AA-MM-DD)'
           }
         },
         yAxis: {
           // Pongo el título para el eje de las 'Y'
             title: {
               text: 'Peso (Kg)'
             }
         },
         series: [{
             name: 'Peso',
             color: '#088A68',
             allowPointSelect: true,
             data: (function() {
                     // generate an array of random data
                     var data = [];
                     var tam2 = tam - 1;
                       for(var i = tam2; i >= 0; i--){
                          data.push([self.somatometrias_previas2()[i].fecha(),self.somatometrias_previas2()[i].peso()]);
                       }
                     return data;
                 })()
         }],
         tooltip: {
                valueSuffix: ' kg'
            },
         credits: {
                 enabled: false
         }
      });

      chart2 = new Highcharts.Chart({
          chart: {
            renderTo: 'contenedor2', 	// Le doy el nombre a la gráfica
            defaultSeriesType: 'line'	// Pongo que tipo de gráfica es
          },
          title: {
            text: 'Registros previos de oximetría'	// Titulo (Opcional)
          },
          subtitle: {
            text:  (function() {
                    var text = 'Paciente: ';
                    var data_paciente = self.Paciente()[0].nombre();
                    var text_final = text.concat(data_paciente);
                    return text_final;
                })()
          },
          xAxis: {
            categories: (function() {
                    // generate an array of random data
                    var data_peso = [];
                    var tam2 = tam - 1;
                      for(var i = tam2; i >= 0; i--){
                         data_peso.push([self.somatometrias_previas2()[i].fecha()]);
                      }
                    return data_peso;
                })(),
            title: {
              text: 'Fecha en la que se midió oximetría de paciente (AA-MM-DD)'
              }
          },
          yAxis: {
            // Pongo el título para el eje de las 'Y'
              title: {
                text: 'Oximetría (%)'
              }
          },
          series: [{
              name: 'Oxígeno en la sangre',
              color: '#2E64FE',
              allowPointSelect: true,
              data: (function() {
                      // generate an array of random data
                      var data = [];
                      var tam2 = tam - 1;
                      for(var i=tam2; i>=0; i--){
                         data.push([self.somatometrias_previas2()[i].fecha(),self.somatometrias_previas2()[i].oximetria()]);
                      }
                      return data;
                  })()
          }],
          tooltip: {
                valueSuffix: ' %'
            },
          credits: {
                  enabled: false
          }
      });

      chart3 = new Highcharts.Chart({
          chart: {
            renderTo: 'contenedor3', 	// Le doy el nombre a la gráfica
            defaultSeriesType: 'line'	// Pongo que tipo de gráfica es
          },
          title: {
            text: 'Registros previos de presión sistólica y diastólica'	// Titulo (Opcional)
          },
          subtitle: {
            text:  (function() {
                     var text = 'Paciente: ';
                     var data_paciente = self.Paciente()[0].nombre();
                     var text_final = text.concat(data_paciente);
                     return text_final;
                  })()
          },
          xAxis: {
            categories: (function() {
                   // generate an array of random data
                   var data_peso = [];
                   var tam2 = tam - 1;
                     for(var i = tam2; i >= 0; i--){
                        data_peso.push([self.somatometrias_previas2()[i].fecha()]);
                     }
                   return data_peso;
               })(),
            // Pongo el título para el eje de las 'X'
            title: {
              text: 'Fecha en que se tomó la presión del paciente'
            }
          },
          yAxis: {
            // Pongo el título para el eje de las 'Y'
              title: {
                text: 'Presión (mm/Hg)'
              }
          },
          series: [{
              name: 'Presión sistólica',
              allowPointSelect: true,
              data: (function() {
                      // generate an array of random data
                      var data = [];
                      var tam2 = tam - 1;
                      for(var i=tam2; i>=0; i--){
                         data.push([self.somatometrias_previas2()[i].fecha(),self.somatometrias_previas2()[i].psistolica()]);
                      }
                      return data;
                  })()
          },{
            name: 'Presión diastólica',
            color: '#00FF80',
            allowPointSelect: true,
            data: (function() {
                    // generate an array of random data
                    var data = [];
                    var tam2 = tam - 1;
                    for(var i=tam2; i>=0; i--){
                       data.push([self.somatometrias_previas2()[i].fecha(),self.somatometrias_previas2()[i].pdiastolica()]);
                    }
                    return data;
                })()
          }],
          tooltip: {
                valueSuffix: ' mm/Hg'
            },
          credits: {
                  enabled: false
          }
      });

      chart4 = new Highcharts.Chart({
          chart: {
            renderTo: 'contenedor4', 	// Le doy el nombre a la gráfica
            defaultSeriesType: 'line'	// Pongo que tipo de gráfica es
          },
          title: {
            text: 'Registros previos de glucometría'	// Titulo (Opcional)
          },
          subtitle: {
            text: (function() {
                    var text = 'Paciente: ';
                    var data_paciente = self.Paciente()[0].nombre();
                    var text_final = text.concat(data_paciente);
                    return text_final;
                })()
          },
          xAxis: {
            categories: (function() {
                    // generate an array of random data
                    var data_peso = [];
                    var tam2 = tam - 1;
                      for(var i = tam2; i >= 0; i--){
                         data_peso.push([self.somatometrias_previas2()[i].fecha()]);
                      }
                    return data_peso;
                })(),
            // Pongo el título para el eje de las 'X'
            title: {
              text: 'Fecha en la cual se midió glucometría de paciente'
            }
          },
          yAxis: {
            // Pongo el título para el eje de las 'Y'
              title: {
                text: 'Glucometría (mg/dL)'
              }
          },
          series: [{
              name: 'Glucometría',
              color : '#DF013A',
              allowPointSelect: true,
              data: (function() {
                      // generate an array of random data
                      var data = [];
                      var tam2 = tam - 1;
                      for(var i=tam2; i>=0; i--){
                         data.push([self.somatometrias_previas2()[i].fecha(),self.somatometrias_previas2()[i].glucometria()]);
                      }
                      return data;
                  })()
          }],
          tooltip: {
                valueSuffix: ' mg/dL'
            },
          credits: {
                  enabled: false
          }
      });
     }
}
  //agregar nuevo medicamento administrado
   self.agregarMedicamento=function(){
       self.nuevo_medicamento.push(new Medicamento({nombre_medicamento: null,
       fecha_admin: null, cantidad:null, via: null}));
   }
  //Quita nuevo medicamento
  self.removeNewMedicamento=function(medicamento){self.nuevo_medicamento.remove(medicamento)}

  //agregar nuevo medicamento actual
   self.agregarMedicamentoActual=function(){
       self.nuevo_medicamento_actual.push(new MedActual({nombre_med: null, via: null}));
   }
  //Quita nuevo medicamento
  self.removeNewMedicamentoActual=function(medicamento){self.nuevo_medicamento_actual.remove(medicamento)}

   //agregar nuevo medicamento administrado
    self.agregarHabitus=function(){
        self.nuevo_habitus.push(new Habitus({condicion: null,
        constitucion: null, entereza:null, proporcion: null, simetria: null,
        biotipo: null, actitud:null, fascies: null, movanormal: null,
        movanormal_obs: null, marchanormal:null}));
    }
    //Quita nuevo habitus
    self.removeNewHabitus=function(){
      self.nuevo_habitus.pop();}
      self.recargar=function(){
      var r= confirm("¿Salir de la venta actual?");
      if (r==true) {location.reload();}
    }

  //Añade un nuevo gasto mensual y lo guarda en un arreglo.
  self.agregarHoja=function(){
    var r= confirm("¿Guardar nuevo registro?");
    if (r==true) {
      //Variable que indica si hubo algún error
      var bandera = 0;
      //condiciones para la somatometría
      if (self.peso()==undefined && bandera==0) {alert("Faltan datos: peso en la somatomería"); bandera =1;}
      if (self.altura()==undefined && bandera==0) {alert("Faltan datos: altura en la somatomería"); bandera =1;}
      if (self.psistolica()==undefined && bandera==0) {alert("Faltan datos: presión sistólica en la somatomería"); bandera =1;}
      if (self.pdiastolica()==undefined && bandera==0) {alert("Faltan datos: presión diastólica en la somatomería"); bandera =1;}
      if (self.frespiratoria()==undefined && bandera==0) {alert("Faltan datos: frecuencia respiratoria en la somatomería"); bandera =1;}
      if (self.pulso()==undefined && bandera==0) {alert("Faltan datos: pulso en la somatomería"); bandera =1;}
      if (self.oximetria()==undefined && bandera==0) {alert("Faltan datos: oximetría en la somatomería"); bandera =1;}
      if (self.glucometria()==undefined && bandera==0) {alert("Faltan datos: glucometría en la somatomería"); bandera =1;}
      //condiciones para el hábitus exterior
      /*
      if (self.nuevo_habitus().length > 0) {
        if (self.condicion()[0]==undefined) {alert("Faltan datos: condición en el hábitus exterior"); bandera =1;}
        if (self.constitucion()[0]==undefined) {alert("Faltan datos: constitución en el hábitus exterior"); bandera =1;}
        if (self.entereza()[0]==undefined) {alert("Faltan datos: entereza en el hábitus exterior"); bandera =1;}
        if (self.proporcion()[0]==undefined) {alert("Faltan datos: proporción en el hábitus exterior"); bandera =1;}
        if (self.simetria()[0]==undefined) {alert("Faltan datos: simetría en el hábitus exterior"); bandera =1;}
        if (self.biotipo()[0]==undefined) {alert("Faltan datos: biotipo en el hábitus exterior"); bandera =1;}
        if (self.actitud()[0]==undefined) {alert("Faltan datos: actitud en el hábitus exterior"); bandera =1;}
        if (self.fascies()[0]==undefined) {alert("Faltan datos: fascies en el hábitus exterior"); bandera =1;}
        if (self.movanormales()[0]==undefined) {alert("Faltan datos: movimientos anormales en el hábitus exterior"); bandera =1;}
        if (self.movanormal_obs()[0]==undefined) {alert("Faltan datos: observaciones de movimientos anormales en el hábitus exterior"); bandera =1;}
        if (self.marchanormal()[0]==undefined) {alert("Faltan datos: marchas anormales en el hábitus exterior"); bandera =1;}
      }
      //condiciones para medicamentos administrados
      if (self.nuevo_medicamento().length>0) {
        for (var i = 0; i < self.nuevo_medicamento().length; i++) {
          if (self.nuevo_medicamento()[i].nombre_medicamento()==undefined) {
            alert("Faltan datos: nombre de medicamento en nuevos medicamentos"); bandera =1;;
          }
          if (self.nuevo_medicamento()[i].fecha_admin()==undefined) {
            alert("Faltan datos: fecha de administración en nuevos medicamentos"); bandera =1;;
          }
          if (self.nuevo_medicamento()[i].cantidad()==undefined) {
            alert("Faltan datos: cantidad en nuevos medicamentos"); bandera =1;;
          }
          if (self.nuevo_medicamento()[i].via()==undefined) {
            alert("Faltan datos: vía de administración en nuevos medicamentos"); bandera =1;;
          }
        }
      }*/
      //condiciones para medicamentos actuales
      if (self.nuevo_medicamento_actual().length>0) {
        for (var i = 0; i < self.nuevo_medicamento_actual().length; i++) {
          if (self.nuevo_medicamento_actual()[i].nombre_med()==undefined) {
            alert("Faltan datos: nombre de medicamento en nuevos medicamentos actuales"); bandera =1;;
          }
          if (self.nuevo_medicamento_actual()[i].via()==undefined) {
            alert("Faltan datos: vía de administración en nuevos medicamentos actuales"); bandera =1;;
          }
        }
      }
      if(bandera == 0){
        var token = $("#token").val();
        $.ajax({
           url: 'AddNurseSheet',
           headers: {'X-CSRF-TOKEN': token},
           type: 'POST',
           data: {
             id_paciente: self.Paciente()[0].id_paciente(),
             peso: self.peso(),altura: self.altura(),
             psistolica: self.psistolica(), pdiastolica: self.pdiastolica(), frespiratoria: self.frespiratoria(),
             pulso: self.pulso(),oximetria: self.oximetria(),glucometria: self.glucometria(),
             nuevo_habitus: self.nuevo_habitus(), nuevo_medicamento: self.nuevo_medicamento(),
             nuevo_medicamento_actual: self.nuevo_medicamento_actual()
           },
           dataType: 'JSON',
           error: function(respuesta) {alert("error");},
           success: function(respuesta) {
             if (respuesta) {
               alert("Se han asignado la hoja de enfermería correctamente");
               var r2= confirm("¿Desea crear documento PDF de la HDE?");
               if (r2==true) {
                 document.location.href = 'pdf';
                 //document.location.href = 'hojas';
               }
               else {
                 //document.location.href = 'hojas';
               }

             }else {
               alert("error");
             }
           }
       });
     }
    }
  }
}
//Se aplican los "enlaces" o "encadenamientos"  de las variables de javascript con sus
//contrapartes en la parte visual de la aplicación
ko.applyBindings(new appViewModel());
