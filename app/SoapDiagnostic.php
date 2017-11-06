<?php

namespace SIAM;

use SIAM\Pacient;
use SIAM\Date;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoapDiagnostic extends Model
{
  use SoftDeletes;

  /**
   * Tabla de la base de datos usada por el modelo Cita
   *
   * @var string
   */

  protected $table = 'soapdiagnostics';
  protected $dates = ['deleted_at'];

  /**
   * Atributos que son llenados cuando se crea un nuevo registro de Cita
   *
   * @var array
   */

  protected $fillable = ['id_soap','id_diagnostico','tipo'];

  //The diagnostic that belongs to the soapDiagnostic
  public function diagnostic()
  {
      return $this->belongsTo('SIAM\Diagnostic','id_diagnostico');
  }
}
