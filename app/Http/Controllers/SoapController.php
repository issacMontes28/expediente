<?php

namespace SIAM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use SIAM\Http\Requests\DateCreateRequest;
use SIAM\Http\Requests;
use SIAM\Http\Controllers\Controller;
use SIAM\Pacient;
use SIAM\Date;
use SIAM\Doctor;
use SIAM\Soap;
use SIAM\Diagnostic;
use SIAM\SoapDiagnostic;
use Carbon\Carbon;
use Session;
use Redirect;
use DB;


class SoapController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
   public function index(Request $request)
   {
     $dates = Date::fecha($request->get('fecha1'))->orderBy('id','DESC')->paginate(6);
     /*$pacients = Pacient::where('nombre',1)
              ->orderBy('apaterno', 'ASC')->paginate(5);*/
     $pacients = DB::table('pacients')
                 ->orderBy('apaterno', 'asc')
                 ->get();
     //se returna la vista con todos los registros
     return view('soaps/index',compact('dates','pacients'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create()
   {
     $pacients = DB::table('pacients')
                  ->orderBy('apaterno', 'asc')
                  ->get();
     $doctors = DB::table('doctors')
                  ->orderBy('apaterno', 'asc')
                  ->get();;
     $medicaments = Medicament::all();
     return view('Citas/date_create',compact('pacients','doctors','medicaments'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function addItem(Request $request)
    {
      if($request->ajax()){
        //Se crea la somatometría de la hoja de enfermería
        Soap::create([
        'id_cita' => $request->id_cita,
        'subjetivo' => $request->subjetivo,
        'objetivo' => $request->objetivo,
        'analisis' => $request->analisis,
        'plan' => $request->plan]);

        //se recupera la última hoja SOAP para poder asignale los diagósticos iniciales y finales
        $soaps= Soap::all();
        $soap = $soaps->last();

        for ($i=0; $i < count($request->diniciales); $i++) {
          $nombre_diag = $request->diniciales[$i]["nombre"];
          $diagnosticos = DB::select("select * from diagnosticos where nombre='$nombre_diag'");
          foreach ($diagnosticos as $diagnostico) {
            $id_diag= $diagnostico->id;
          }
          SoapDiagnostic::create([
          'id_soap' => $soap->id,
          'id_diagnostico' => $id_diag,
          'tipo' => "Inicial"]);
        }
        for ($i=0; $i < count($request->difinales); $i++) {
          $nombre_diag = $request->difinales[$i]["nombre"];
          $diagnosticos = DB::select("select * from diagnosticos where nombre='$nombre_diag'");
          foreach ($diagnosticos as $diagnostico) {
            $id_diag= $diagnostico->id;
          }
          SoapDiagnostic::create([
          'id_soap' => $soap->id,
          'id_diagnostico' => $id_diag,
          'tipo' => "Final"]);
        }

        return response()->json(["mensaje"=>"Análisis SOAP asignado correctamente"]);
        //self::reporte($request);
      }
    }
  /*
   public function store(Request $request)
   {
     //el método create() crea un nuevo registro, se deben asociar los datos del request
     //con las columnas de la tabla
     Soap::create([
       'id_cita' => 1,
       'subjetivo' => $request['subjetivo'],
       'objetivo' => $request['objetivo'],
       'analisis' => $request['analisis'],
       'plan' => $request['plan']
     ]);

     return redirect('soap/show')->with('message','Se ha agregado análisis SOAP a la conculta');
   }*/

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show(Request $request)
     {
       $dates = Date::fecha($request->get('fecha1'))->orderBy('id','DESC')->paginate(6);
       /*$pacients = Pacient::where('nombre',1)
                ->orderBy('apaterno', 'ASC')->paginate(5);*/
       $pacients = DB::table('pacients')
                   ->orderBy('apaterno', 'asc')
                   ->get();
       //se returna la vista con todos los registros
       return view('soaps/show',compact('dates','pacients'));
     }
    public function showsoap($id){
      $date = Date::find($id);
      $id_paciente = $date->id_paciente;
      $paciente = Pacient::find($id_paciente);
      $soap = Soap::find($id);
      return view('soaps/show_soap',compact('date','paciente','soap'));
     }
   public function show_date_pacient(Request $request)
     {
       $dates = Date::name($request->get('id_paciente'))->orderBy('id','DESC')->paginate(6);
       $pacients = DB::table('pacients')
                   ->orderBy('apaterno', 'asc')
                   ->get();
         return view('dates/show',compact('dates','pacients'));
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
       $soaps = Soap::fecha($request->get('fecha1'))->orderBy('id','DESC')->paginate(6);
       /*$pacients = Pacient::where('nombre',1)
                ->orderBy('apaterno', 'ASC')->paginate(5);*/
       $pacients = DB::table('pacients')
                   ->orderBy('apaterno', 'asc')
                   ->get();
       //se returna la vista con todos los registros
       return view('soaps/update',compact('soaps','pacients'));
     }
   //ya que se ha eligido uno, se aparta para editarlo
     public function edit($id)
   {
      $soap = Soap::find($id);
      $id_soap = $soap->id;
      $data = SoapDiagnostic::select("id_diagnostico","tipo")->where("id_soap","=","$id_soap")->get();
      foreach ($data as $diagnostico) {
        $data2 = Diagnostic::select("id","nombre")->where("id","=","{$diagnostico->id_diagnostico}")->get();
        foreach ($data2 as $diagnostico2) {
          $ndiagnostico = $diagnostico2->nombre;
        }
        if ($diagnostico->tipo == 'Inicial') {
          $dinicial = $ndiagnostico;
          $id_dinicial = $diagnostico2->id;
        }
        else {
          $difinal = $ndiagnostico;
          $id_difinal = $diagnostico2->id;
        }
      }
      return view('soaps.edit',['soap'=>$soap,'dinicial'=>$dinicial,'id_dinicial'=>$id_dinicial,
       'difinal'=>$difinal, 'id_difinal'=>$id_difinal]);
   }
   /**
    * Actualiza el registro en la base de datos
    * Recibe como parámetro un Request, que es el formulario que contiene
    * los datos que se van a actualizar y el id del registro a modificar
    * @param  int  $id
    * @return Response
    */
   public function update(DateCreateRequest $request,$id)
   {
      //se encuentra el registro con el id que se busca, y se almacena en una variable
      $date = Date::find($id);
      //se llama a la función que llena el registro con los datos almacenados en
      //el request
      $date->fill($request->all());
      //Se guardan los cambios hechos
      $date->save();
      //se manda mensaje mensaje de confirmación
      Session::flash('message','Cita Actualizada Correctamente');
      //Se redirecciona a la vista que muestra los registros
      return Redirect::to('date/show');

   }
    //Muestra todos las citas de la base de datos para elegir al que se quiere eliminar
    public function deleter(Request $request)
    {
      $soaps = Soap::fecha($request->get('fecha1'))->orderBy('id','DESC')->paginate(6);
      /*$pacients = Pacient::where('nombre',1)
               ->orderBy('apaterno', 'ASC')->paginate(5);*/
      $pacients = DB::table('pacients')
                  ->orderBy('apaterno', 'asc')
                  ->get();
      //se returna la vista con todos los registros
      return view('soaps/delete',compact('soaps','pacients'));
    }
    /**
     * Remueve el elemento de la base de datos, recibe como parámetro
     *el id del usuario que se va a eliminar
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
      //se invoca a la función del modelo que elimina el paciente que tenga ese id
      //Date::destroy($id);
      $date = Date::find($id);
      $date->delete();
      //se manda mensaje mensaje de confirmación
      Session::flash('message','Cita eliminada de la base de datos correctamente');
      //Se redirecciona a la vista que muestra los registros
      return Redirect::to('/date/show');
    }
    public function show_details(Request $request,$id){
      if ($request->ajax()) {
        $soap = Soap::find($id);
        $data = SoapDiagnostic::select("id_diagnostico","tipo")->where("id_soap","=","$id")->get();
        foreach ($data as $diagnostico) {
          $data2 = Diagnostic::select("id","nombre")->where("id","=","{$diagnostico->id_diagnostico}")->get();
          foreach ($data2 as $diagnostico2) {$ndiagnostico = $diagnostico2->nombre;}
          if ($diagnostico->tipo == 'Inicial') {$dinicial = $ndiagnostico;}
          else {$difinal = $ndiagnostico;}
        }
        $info = array('soap' => $soap, 'dinicial' => $dinicial,'difinal' => $difinal);
        return response()->json($info);
      }
    }
    public function diagnosticos(Request $request){
      $diagnostics_array = array();
      $data = Diagnostic::select("nombre","id")->where("nombre","LIKE","%{$request->q}%")->get();
      foreach ($data as $diagnostico) {
        $diagnostics_array[] = array('id' => $diagnostico->id,'nombre'=> $diagnostico->nombre);
      }

      //Se crea el archivo json, si existe, se sobreescribe
      $collection = Collection::make($diagnostics_array);
      $collection->toJson();
      $file = 'json/diagnosticos.json';
      file_put_contents($file, $collection);

      return response()->json($data);
    }
}
