<?php

namespace SIAM\Http\Controllers;

use Illuminate\Http\Request;
use SIAM\Http\Requests;
use Illuminate\Support\Collection;
use SIAM\Http\Controllers\Controller;
use SIAM\Study;
use SIAM\StudyMatch;
use SIAM\Diagnostic;
use DB;
use Carbon\Carbon;
use Session;
use Redirect;

class StudyController extends Controller
{
  /**
   * El método index redirecciona a la página principal de promotionProducts,
   * mostrando el menú de opciones
   *
   * @return Response
   */

  /**
   * El método create devuelve la vista que tiene el formulario que se
   *llenará para almacenar un nuevo registro
   *
   * @return Response
   */
  public function create()
  {
    $estudios = Study::all();
    $collection = Collection::make($estudios);
    $collection->toJson();

    $enfermedades = array();
    $data = Diagnostic::select("nombre","id")
			 					->orderBy('nombre', 'asc')
                ->get();
    foreach ($data as $enfermedad) {
      $enfermedades[] = array('id' => $enfermedad->id,'nombre'=> $enfermedad->nombre);
    }
    $collection2 = Collection::make($enfermedades);
    $collection2->toJson();

    //Se crea el archivo json, si existe, se sobreescribe
    $file = 'json/estudios.json';
    file_put_contents($file, $collection);
    $file = 'json/diagnosticos.json';
    file_put_contents($file, $collection2);
    return view('Estudios/studyMatchCreate2');
  }

  public function AddItem(Request $request)
  {
    if($request->ajax()){
      for ($i=0; $i < count($request->matches) ; $i++) {
         StudyMatch::create([
          'id_estudio' => $request->matches[$i]["id_estudio"],
          'id_enfermedad' => $request->matches[$i]["id_diagnostico"],
          'proposito' => $request->matches[$i]["proposito"],
          'metodologia' => $request->matches[$i]["metodologia"]
        ]);
    }
    return response()->json(["mensaje"=>"Estudios asignados a diagnósticos correctamente"]);
   }
 }
 public function diagnosticos(Request $request, $letra_diagnostico){
   if ($request->ajax()) {
     $diag = "$letra_diagnostico"."%";
     $diagnosticos = DB::table('diagnosticos')
                 ->where('nombre', 'like', $diag)
                 ->get();
     return response()->json($diagnosticos);
   }
 }
 public function estudios(Request $request, $letra_estudio){
   if ($request->ajax()) {
     $est = "$letra_estudio"."%";
     $diagnosticos = DB::table('studies')
                 ->where('nombre', 'like', $est)
                 ->get();
     return response()->json($diagnosticos);
   }
 }
 public function eliminar(){
   $matches = StudyMatch::all();
   return view('Estudios/studyMatchDelete',['matches'=>$matches]);
 }
 public function destroy($id){
   DB::table('studymatches')->where('id', '=', "$id")->update(['deleted_at' => Carbon::now()]);
   Session::flash('message','Se ha eliminado enlace correctamente');
   return Redirect::to('eliminarMatch/');
 }
 public function show(Request $request)
  {
    $matches = StudyMatch::fecha($request->get('fecha1'))->orderBy('id','DESC')->paginate(6);
    return view('Estudios/studyMatchDelete',['matches'=>$matches]);
  }
  public function showUser(Request $request)
   {
     $matches = StudyMatch::user($request->get('id_usuario'))->orderBy('id','DESC')->paginate(6);
     return view('Estudios/studyMatchDelete',['matches'=>$matches]);
   }
}
