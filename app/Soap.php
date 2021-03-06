<?php

namespace SIAM;

use SIAM\Pacient;
use SIAM\Date;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Soap extends Model
{
  use SoftDeletes;
  /**
   * Tabla de la base de datos usada por el modelo Cita
   *
   * @var string
   */
  protected $table = 'soaps';
  protected $dates = ['deleted_at'];
  /**
   * Atributos que son llenados cuando se crea un nuevo registro de Cita
   *
   * @var array
   */

  protected $fillable = ['id_cita','subjetivo','objetivo','analisis','plan'];

  public function pacient(){
      return $this->belongsTo('SIAM\Date','id_cita');
  }

  public function scopeFecha($query,$fecha1){
    if ($fecha1 != null) {
      $query->where('fecha',"=","$fecha1");
    }
  }
  public function scopeName($query,$id_paciente){
    if ($id_paciente != null) {
      $fila_citas = DB::select("select * from dates where id_paciente='$id_paciente'");
      $array = array();
      foreach ($fila_citas as $cita) {
        $array[] = array('valor'=> $cita->id);
      }
      $query->whereIn('id_cita',$array);
    }
  }

  /**
   * Get the date record associated with the soap.
   */

  public function date()
  {
    return $this->belongsTo('SIAM\Date','id_cita');
  }

  /**
   * Get the date soapDiagnostics associated with the soap.
  */

  public function soapdiagnostics()
  {
    return $this->hasMany('SIAM\SoapDiagnostic','id_soap');
  }

  /**
  * Get the date diagnostics associated with the soap.
  */

  public function diagnostics()
  {
    return $this->belongsToMany('SIAM\Diagnostic','soapDiagnostics','id_soap', 'id_diagnostico');
  }
}
