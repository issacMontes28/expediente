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
    return view('Estudios/studyMatchCreate');
  }

  public function AddItem(Request $request)
  {
    if($request->ajax()){
      for ($i=0; $i < count($request->matches) ; $i++) {
         StudyMatch::create([
          'id_estudio' => $request->matches[$i]["id_estudio"],
          'id_enfermedad' => $request->matches[$i]["id_diagnostico"]
        ]);
    }
    return response()->json(["mensaje"=>"Estudios asignados a diagnósticos correctamente"]);
   }
 }
  /**
   * Muestra a todas las promociones
   *
   * @param  int  $id
   * @return Response
   */
   /*
  public function show(Request $request)
  {
    $promotionProducts = PromotionProduct::name($request->get('name'))->orderBy('nombre','ASC')->paginate(5);
    return view('PromotionProducts/promotionProduct_show',compact('promotionProducts'));

  }*/
}
