<?php

namespace SIAM;

use SIAM\Pacient;
use SIAM\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
  use SoftDeletes;

  protected $table = 'requests';
  protected $dates = ['deleted_at'];
  protected $fillable = ['id_cita','subjetivo','objetivo','analisis','plan'];

  /**
  * Get the date doctor associated with the request.
  */
  public function doctor()
  {
    return $this->belongsTo('SIAM\Doctor','id_doctor');
  }

  /**
  * Get the date pacient associated with the request.
  */
  public function pacient()
  {
    return $this->belongsTo('SIAM\Pacient','id_paciente');
  }

  /**
  * Get the studies associated with the request.
  */

  public function studyRequests()
  {
    return $this->hasMany('SIAM\StudyRequest','id_request');
  }


}
