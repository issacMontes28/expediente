<?php

namespace SIAM\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\Http\Requests\PacientCreateRequest;
use SIAM\Http\Controllers\Controller;
use SIAM\Pacient;
use SIAM\Date;
use SIAM\State;
use SIAM\Town;
use SIAM\Locality;
use SIAM\Nationality;
use SIAM\Ahf;
use SIAM\App;
use SIAM\Apnp;
use SIAM\Ago;
use DB;
use PDF;
use Carbon\Carbon;
use Session;
use Redirect;

class PacientController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index(Request $request)
  {
    if ($request)
        {
            $query=trim($request->get('searchText'));
            $pacientes = Pacient::name($request->get('name'))->orderBy('id','DESC')->paginate(5);
            return view('pacients.index',["pacients"=>$pacientes,"searchText"=>$query]);
        }
  }
  /**
  * Show the form for creating a new resource.
  *
  * @return Response
  */
  public function create()
  {
    $states = State::pluck('NOM_ENT','CVE_ENT');
    $nationalities = Nationality::nationalities();
    return view('pacients/create',compact('states','nationalities'));
  }
  public function getTowns(Request $request, $id){
    if ($request->ajax()) {
      $towns = Town::towns($id);
      return response()->json($towns);
    }
  }
  public function getLocalities(Request $request, $id_estado , $id_municipio){
    if ($request->ajax()) {
      $localities = Locality::localities($id_estado,$id_municipio);
      return response()->json($localities);
    }
  }
  public function getTowns2(Request $request, $id_paciente, $id){
    if ($request->ajax()) {
      $towns = Town::towns($id);
      return response()->json($towns);
    }
  }
  public function getLocalities2(Request $request, $id_paciente, $id_estado , $id_municipio){
    if ($request->ajax()) {
      $localities = Locality::localities($id_estado,$id_municipio);
      return response()->json($localities);
    }
  }
  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */

  public function addPacient(PacientCreateRequest $request)
  {
    //el método create() crea un nuevo registro, se deben asociar los datos del request
    //con las columnas de la tabla
    Pacient::create([
    'nombre'           => $request['nombre'],
    'apaterno'         => $request['apaterno'],
    'amaterno'         => $request['amaterno'],
    'sexo'             => $request['sexo'],
    'fecha_nac'        => $request['fecha_nac'],
    'curp'             => $request['curp'],
    'nacionalidad'     => $request['nacionalidad'],
    'calle'            => $request['calle'],
    'num_ext'          => $request['num_ext'],
    'num_int'          => $request['num_int'],
    'colonia'          => $request['colonia'],
    'cp'               => $request['cp'],
    'localidad'        => $request['localidad'],
    'municipio'        => $request['municipio'],
    'estado'           => $request['estado'],
    'telefono_casa'    => $request['telefono_casa'],
    'telefono_celular' => $request['telefono_celular'],
    'telefono_oficina' => $request['telefono_oficina'],
    'correo'           => $request['correo']
    ]);

    $fecha = Carbon::now();
    $pacients= Pacient::all();
    $upacient = $pacients->last();
    $id_paciente = $upacient->id;

    //Agregamos antecedentes heredoFamiliares
    Ahf::create([
      'id_paciente'	 => $id_paciente,
      'diabetes'	   => $request['diabetes'],
      'hipertension' => $request['hipertension'],
      'cardiopatia'	 => $request['cardiopatia'],
      'hepatopatia'	 => $request['hepatopatia'],
      'nefropatia'	 => $request['nefropatia'],
      'enmentales'	 => $request['enmentales'],
      'asma'	       => $request['asma'],
      'cancer'	     => $request['cancer'],
      'enalergicas'	 => $request['enalergicas'],
      'endocrinas'	 => $request['endocrinas'],
      'otros'	       => $request['otros'],
      'intneg'	     => $request['intneg']
    ]);

    //Agregamos antecedentes personales patológicos
    App::create([
      'id_paciente'	     => $id_paciente,
      'enactuales'	     => $request['enactuales'],
      'quirurjicos'	     => $request['quirurjicos'],
      'transfuncionales' => $request['transfuncionales'],
      'alergias'	       => $request['alergias'],
      'traumaticos'	     => $request['traumaticos'],
      'hosprevias'	     => $request['hosprevias'],
      'adicciones'	     => $request['adicciones'],
      'otros'            => $request['adicciones']
    ]);

    //Agregamos antecedentes personales no patológicos
    Apnp::create([
      'id_paciente'  => $id_paciente,
      'banio'        => $request['banio'],
      'dientes'      => $request['dientes'],
      'habitacion'   => $request['habitacion'],
      'tabaquismo'   => $request['tabaquismo'],
      'alcoholismo'  => $request['alcoholismo'],
      'alimentacion' => $request['alimentacion'],
      'deportes'     => $request['deportes']
    ]);

    if (empty($request['menarca']) && empty($request['rmenstrual']) && empty($request['dismenorrea']) && empty($request['ivsa']) && empty($request['parejas']) && empty($request['gestas']) && empty($request['abortos']) && empty($request['partos']) && empty($request['cesareas']) && empty($request['fpp']) && empty($request['menopausia']) && empty($request['climaterio']) && empty($request['mpp']) && empty($request['citologia']) && empty($request['mastografia'])) {
      # nothing to do here...
    }
    else {
      //Agregamos antecedentes gineco-obstétricos
      Ago::create([
        'id_paciente' => $id_paciente,
        'menarca'     => $request['menarca'],
        'rmenstrual'  => $request['rmenstrual'],
        'dismenorrea' => $request['dismenorrea'],
        'ivsa'        => $request['ivsa'],
        'parejas'     => $request['parejas'],
        'gestas'      => $request['gestas'],
        'abortos'     => $request['abortos'],
        'partos'      => $request['partos'],
        'cesareas'    => $request['cesareas'],
        'fpp'         => $request['fpp'],
        'menopausia'  => $request['menopausia'],
        'climaterio'  => $request['climaterio'],
        'mpp'         => $request['mpp'],
        'citologia'   => $request['citologia'],
        'mastografia' => $request['mastografia']
      ]);
    }

    return response()->json("Paciente registrado correctamente");
  }
  public function pdf($apartados2)
  {
    $apartados              = str_split($apartados2, 1);
    $fecha                  = Carbon::now();
    $pacients               = Pacient::all();
    $upacient               = $pacients->last();
    $id_paciente            = $upacient->id;
    $nombre_paciente        = $upacient->nombre.' '.$upacient->apaterno.' '.$upacient->amaterno;
    $datos_personales_array = array();
    $antecedentes_hf_array  = array();
    $antecedentes_pp_array  = array();
    $antecedentes_pnp_array = array();
    $antecedentes_go_array  = array();
    $info_array             = array();

    for ($i=0; $i < count($apartados) ; $i++) {
      if ($apartados[$i] == 1) {
        $datos_personales_array[] = array(
        'nombre_paciente'  => $upacient->nombre.' '.$upacient->apaterno.' '.$upacient->amaterno,
        'nombre'           => $upacient->nombre,
        'apaterno'         => $upacient->apaterno,
        'amaterno'         => $upacient->amaterno,
        'sexo'             => $upacient->sexo,
        'fecha_nac'        => $upacient->fecha_nac,
        'curp'             => $upacient->curp,
        'nacionalidad'     => $upacient->nacionalidad,
        'calle'            => $upacient->calle,
        'num_ext'          => $upacient->num_ext,
        'num_int'          => $upacient->num_int,
        'colonia'          => $upacient->colonia,
        'cp'               => $upacient->cp,
        'localidad'        => $upacient->localidad,
        'municipio'        => $upacient->municipio,
        'estado'           => $upacient->estado,
        'telefono_casa'    => $upacient->telefono_casa,
        'telefono_celular' => $upacient->telefono_celular,
        'telefono_oficina' => $upacient->telefono_oficina,
        'correo'           => $upacient->correo
        );
        $info_array[]  = 'Datos_personales';
      }
      if ($apartados[$i] == 2) {
        $fila_antecedentes_hf = DB::select("select * FROM antecedenteshf where id_paciente='$id_paciente'");
        foreach ($fila_antecedentes_hf as $antecedente_hf) {
          $antecedentes_hf_array [] = array(
          'diabetes'        => $antecedente_hf->diabetes,
          'hipertension'    => $antecedente_hf->hipertension,
          'cardiopatia'     => $antecedente_hf->cardiopatia,
          'hepatopatia'     => $antecedente_hf->hepatopatia,
          'nefropatia'      => $antecedente_hf->nefropatia,
          'enmentales'      => $antecedente_hf->enmentales,
          'asma'            => $antecedente_hf->asma,
          'cancer'          => $antecedente_hf->cancer,
          'enalergicas'     => $antecedente_hf->enalergicas,
          'endocrinas'      => $antecedente_hf->endocrinas,
          'otros'           => $antecedente_hf->otros,
          'intneg'          => $antecedente_hf->intneg
          );
        }
        $info_array[]  = 'Antecedentes_HF';
      }
      if ($apartados[$i] == 3) {
        $fila_antecedentes_pp = DB::select("select * FROM antecedentespp where id_paciente='$id_paciente'");
        foreach ($fila_antecedentes_pp as $antecedente_pp) {
          $antecedentes_pp_array [] = array(
          'enactuales'        => $antecedente_pp->enactuales,
          'quirurjicos'       => $antecedente_pp->quirurjicos,
          'transfucionales'   => $antecedente_pp->transfuncionales,
          'alergias'          => $antecedente_pp->alergias,
          'traumaticos'       => $antecedente_pp->traumaticos,
          'hosprevias'        => $antecedente_pp->hosprevias,
          'adicciones'        => $antecedente_pp->adicciones,
          'otros'             => $antecedente_pp->otros
          );
        }
        $info_array[]  =  'Antecedentes_PP';
      }
      if ($apartados[$i] == 4) {
        $fila_antecedentes_pnp = DB::select("select * FROM antecedentespnp where id_paciente='$id_paciente'");
        foreach ($fila_antecedentes_pnp as $antecedente_pnp) {
          $antecedentes_pnp_array [] = array(
          'banio'         => $antecedente_pnp->banio,
          'dientes'       => $antecedente_pnp->dientes,
          'habitacion'    => $antecedente_pnp->habitacion,
          'tabaquismo'    => $antecedente_pnp->tabaquismo,
          'alcoholismo'   => $antecedente_pnp->alcoholismo,
          'alimentacion'  => $antecedente_pnp->alimentacion,
          'deportes'      => $antecedente_pnp->deportes
          );
        }
        $info_array[]  = 'Antecedentes_PNP';
      }
      if ($apartados[$i] == 5) {
        $fila_antecedentes_go = DB::select("select * FROM antecedentesgo where id_paciente='$id_paciente'");
        foreach ($fila_antecedentes_go as $antecedente_go) {
          $antecedentes_go_array [] = array(
          'menarca'          => $antecedente_go->menarca,
          'rmenstrual'       => $antecedente_go->rmenstrual,
          'dismenorrea'      => $antecedente_go->dismenorrea,
          'ivsa'             => $antecedente_go->ivsa,
          'parejas'          => $antecedente_go->parejas,
          'gestas'           => $antecedente_go->gestas,
          'abortos'          => $antecedente_go->abortos,
          'partos'           => $antecedente_go->partos,
          'cesareas'         => $antecedente_go->cesareas,
          'fpp'              => $antecedente_go->fpp,
          'menopausia'       => $antecedente_go->menopausia,
          'climaterio'       => $antecedente_go->climaterio,
          'mpp'              => $antecedente_go->climaterio,
          'citologia'        => $antecedente_go->citologia,
          'mastografia'      => $antecedente_go->mastografia
          );
        }
        $info_array[]  = 'Antecedentes_GO';
      }
    }
    $pdf = PDF::loadView('reports/pacient_report',compact(
      'info_array',
      'datos_personales_array',
      'antecedentes_hf_array',
      'antecedentes_pp_array',
      'antecedentes_pnp_array',
      'antecedentes_go_array'
    ));
    $nombre_hoja= 'HojaRegistro'.$nombre_paciente.$fecha.'.pdf';
    return $pdf->download($nombre_hoja);
  }
  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function addNurseSheet($id)
  {
    $somatometries_array = array();
    $somatometries2_array = array();
    $paciente_array = array();

    $paciente = Pacient::find($id);
    $fila_hojas_enfermeria = DB::select("select * FROM nursesheets where id_paciente='$id' ORDER BY id DESC LIMIT 5");

    $fila_paciente = DB::select("select * FROM pacients where id='$id'");
    foreach ($fila_paciente as $fila) {
      $paciente_array[] = array(
        'id_paciente' => $fila->id);
    }

    foreach ($fila_hojas_enfermeria as $fila) {
      $id_hoja    = $fila->id;
      $fecha_hoja = $fila->fecha;
      $fila_somatometria = DB::select("select * FROM nsomatometries where id_ns='$id_hoja'");
      foreach ($fila_somatometria as $fila2) {
        $peso           = $fila2->peso.' kg';
        $altura         = $fila2->altura.' cm';
        $psistolica     = $fila2->psistolica.' mm/Hg';
        $pdiastolica    = $fila2->pdiastolica.' mm/Hg';
        $frespiratoria  = $fila2->frespiratoria;
        $pulso          = $fila2->pulso;
        $oximetria      = $fila2->oximetria.' %';
        $glucometria    = $fila2->glucometria.' mg/dL';

        $peso2          = $fila2->peso;
        $altura2        = $fila2->altura;
        $psistolica2    = $fila2->psistolica;
        $pdiastolica2   = $fila2->pdiastolica;
        $frespiratoria2 = $fila2->frespiratoria;
        $pulso2         = $fila2->pulso;
        $oximetria2     = $fila2->oximetria;
        $glucometria2   = $fila2->glucometria;

        $somatometries_array[] = array(
        'fecha'         => $fecha_hoja,
        'peso'          => $peso,
        'altura'        => $altura,
        'psistolica'    => $psistolica,
        'pdiastolica'   => $pdiastolica,
        'frespiratoria' => $frespiratoria,
        'pulso'         => $pulso,
        'oximetria'     => $oximetria,
        'glucometria'   => $glucometria);

        $somatometries2_array[] = array(
        'fecha'         => $fecha_hoja,
        'peso'          => $peso2,
        'altura'        => $altura2,
        'psistolica'    => $psistolica2,
        'pdiastolica'   => $pdiastolica2,
        'frespiratoria' => $frespiratoria2,
        'pulso'         => $pulso2,
        'oximetria'     => $oximetria2,
        'glucometria'   => $glucometria2);
      }
    }
    //Se crea el archivo json, si existe, se sobreescribe
    $collection = Collection::make($somatometries_array);
    $collection->toJson();
    $file = 'json/somatometrias.json';
    file_put_contents($file, $collection);

    //Se crea el archivo json, si existe, se sobreescribe
    $collection2 = Collection::make($somatometries2_array);
    $collection2->toJson();
    $file2 = 'json/somatometrias2.json';
    file_put_contents($file2, $collection2);

    //Se crea el archivo json, si existe, se sobreescribe
    $collection3 = Collection::make($paciente_array);
    $collection3->toJson();
    $file3 = 'json/pacientehde.json';
    file_put_contents($file3, $collection3);

    return view('nurseSheets/create',['pacient'=>$paciente]);
  }

  public function show(Request $request)
  {
    //dd($request->get('name'));
    $pacients = Pacient::name($request->get('name'))->orderBy('id','DESC')->paginate(4);
    //se returna la vista con todos los registros
    return view('pacients/index',compact('pacients'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id_usuario
  * @return Response
  */
  //muestra a todos los pacientes para elegir uno y actualizarlo
  public function actualizar(Request $request)
  {
  $pacients = Pacient::name($request->get('name'))->orderBy('apaterno','ASC')->paginate(4);
  return view('pacients.update',compact('pacients'));
  }
  //ya que se ha eligido uno, se aparta para editarlo//
  public function edit($id)
  {
    $pacient = Pacient::find($id);
    $pacients = Pacient::all();
    $nacio = $pacient->nacionalidad;
    $fila_nac = DB::select("select * from nationalities where CVE_NAC='$nacio'");
    foreach ($fila_nac as $fila) {
      $nac = $fila->pais;
    }
    $enti = $pacient->estado;
    $fila_enti = DB::select("select * from states where CVE_ENT='$enti'");
    foreach ($fila_enti as $fila1) {
      $ent = $fila1->NOM_ENT;
    }
    $muni = $pacient->municipio;
    $fila_muni = DB::select("select * from towns where CVE_MUN='$muni' and CVE_ENT='$enti'");
    foreach ($fila_muni as $fila2) {
      $mun = $fila2->NOM_MUN;
    }
    $local = $pacient->localidad;
    $fila_loc = DB::select("select * from localities where id='$local'");
    foreach ($fila_loc as $fila3) {
      $loc = $fila3->NOM_LOC;
    }

    $states = State::all();
    $nationalities = Nationality::nationalities();
    $id_paciente       = $pacient->id;
    $antecedentes_go   = " ";
    $fila_go           = DB::select("select * FROM antecedentesgo where id_paciente='$id_paciente'");
    foreach ($fila_go as $go) {
    $antecedentes_go   = $go;
    }
    $antecedentes_hf   = " ";
    $fila_hf           = DB::select("select * FROM antecedenteshf where id_paciente='$id_paciente'");
    foreach ($fila_hf as $hf) {
    $antecedentes_hf   = $hf;
    }
    $antecedentes_pnp  = " ";
    $fila_pnp          = DB::select("select * FROM antecedentespnp where id_paciente='$id_paciente'");
    foreach ($fila_pnp as $pnp) {
    $antecedentes_pnp  = $pnp;
    }
    $antecedentes_pp   = " ";
    $fila_pp           = DB::select("select * FROM antecedentespp where id_paciente='$id_paciente'");
    foreach ($fila_pp as $pp) {
    $antecedentes_pp   = $pp;
    }

    //se returna la vista del formulario que contendrá los datos del elemento
    //a editar
    return view('pacients.edit',[
    'pacient'          => $pacient,
    'pacients'         => $pacients,
    'nationalities'    => $nationalities,
    'states'           => $states,
    'nac'              => $nac,
    'ent'              => $ent,
    'mun'              => $mun,
    'loc'              => $loc,
    'antecedentes_go'  => $antecedentes_go,
    'antecedentes_hf'  => $antecedentes_hf,
    'antecedentes_pnp' => $antecedentes_pnp,
    'antecedentes_pp'  => $antecedentes_pp
    ]);
  }
  /**
  * Actualiza el registro en la base de datos
  * Recibe como parámetro un Request, que es el formulario que contiene
  * los datos que se van a actualizar y el id del registro a modificar
  * @param  int  $id
  * @return Response
  */

  public function update(PacientCreateRequest $request,$id)
  {
  //se encuentra el registro con el id que se busca, y se almacena en una variable
  $pacient = Pacient::find($id);
  //se llama a la función que llena el registro con los datos almacenados en
  //el request
  $pacient->fill($request->all());
  //Se guardan los cambios hechos
  $pacient->save();
  //se manda mensaje mensaje de confirmación
  Session::flash('message','Paciente Actualizado Correctamente');
  //Se redirecciona a la vista que muestra los registros
  return Redirect::to('pacient/');

  }
  //Muestra todos los pacientes de la base de datos para elegir al que se quiere eliminar
  public function deleter(Request $request)
  {
   $pacients = Pacient::name($request->get('name'))->orderBy('apaterno','ASC')->paginate(4);
   return view('pacients.delete',compact('pacients'));
 }
  /**
  * Remueve el elemento de la base de datos, recibe como parámetro
  *el id del usuario que se va a eliminar
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
   $pacient = Pacient::find($id);
   $pacient->delete();
   //se manda mensaje mensaje de confirmación
   Session::flash('message','Paciente eliminado de la base de datos correctamente');
   //Se redirecciona a la vista que muestra los registros
   return Redirect::to('/pacient/index');

  }
  public function registros_paciente(Request $request)
  {
     $nursesheets = NurseSheet::name($request->get('name'))->orderBy('id','DESC')->paginate(6);
     //se returna la vista con todos los registros
     return view('pacients.index',["pacientes"=>$pacientes]);
  }
  public function adddate($id)
  {
    $paciente = Pacient::find($id);
    $pacients = DB::table('pacients')
                ->orderBy('apaterno', 'asc')
                ->get();
    $doctors = DB::table('doctors')
                ->orderBy('apaterno', 'asc')
                ->get();
    return view('dates/create',compact('pacients','doctors','paciente'));
  }
  public function addsoap($id)
  {
    $cita        = Date::find($id);
    $id_cita     = $cita->id;
    $id_paciente = $cita->id_paciente;
    $paciente    = Pacient::find($id_paciente);

    $pacients = DB::table('pacients')
                ->orderBy('apaterno', 'asc')
                ->get();
    $doctors = DB::table('doctors')
                ->orderBy('apaterno', 'asc')
                ->get();
    $matches_array = array();
    $fila_matches = DB::select("select * FROM studymatches");

    foreach ($fila_matches as $fila) {
      $id_estudio      = $fila->id_estudio;
      $id_enfermedad   = $fila->id_enfermedad;
      $fila_estudio    = DB::select("select * FROM studies where id='$id_estudio'");
      $fila_enfermedad = DB::select("select * FROM diagnosticos where id='$id_enfermedad'");

      foreach ($fila_estudio as $estudios) {
        $estudio = $estudios->nombre;
      }
      foreach ($fila_enfermedad as $enfermedades) {
        $enfermedad = $enfermedades->nombre;
      }

      $matches_array[] = array(
      'id_estudio'    => $id_estudio,
      'estudio'       => $estudio,
      'id_enfermedad' => $id_enfermedad,
      'enfermedad'    => $enfermedad);
    }

    $collection4 =  Collection::make($matches_array);
    $collection4 -> toJson();
    $file4       = 'json/matches.json';
    file_put_contents($file4, $collection4);

    return view('soaps/create',compact('cita','pacients','doctors','paciente','id_cita'));
  }
  public function show_details(Request $request,$id){
    if ($request->ajax()) {
      $paciente          = Pacient::find($id);
      $id_paciente       = $paciente->id;
      $antecedentes_go   = " ";
      $fila_go           = DB::select("select * FROM antecedentesgo where id_paciente='$id_paciente'");
      foreach ($fila_go as $go) {
      $antecedentes_go   = $go;
      }
      $antecedentes_hf   = " ";
      $fila_hf           = DB::select("select * FROM antecedenteshf where id_paciente='$id_paciente'");
      foreach ($fila_hf as $hf) {
      $antecedentes_hf   = $hf;
      }
      $antecedentes_pnp  = " ";
      $fila_pnp          = DB::select("select * FROM antecedentespnp where id_paciente='$id_paciente'");
      foreach ($fila_pnp as $pnp) {
      $antecedentes_pnp  = $pnp;
      }
      $antecedentes_pp   = " ";
      $fila_pp           = DB::select("select * FROM antecedentespp where id_paciente='$id_paciente'");
      foreach ($fila_pp as $pp) {
      $antecedentes_pp   = $pp;
      }
      $info = array(
        'paciente'        => $paciente,
        'antecedentesgo'  => $antecedentes_go,
        'antecedenteshf'  => $antecedentes_hf,
        'antecedentespnp' => $antecedentes_pnp,
        'antecedentespp'  => $antecedentes_pp,
      );
      return response()->json($info);
    }
  }
  public function updatePaciente(Request $request,$id)
  {
    $paciente = Pacient::find($id);
    $paciente->fill($request->all());
    $paciente->save();
    return response()->json("paciente actualizado correctamente");
  }
}
