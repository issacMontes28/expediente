<?php

namespace SIAM;

use SIAM\Pacient;
use SIAM\Doctor;
use SIAM\Study;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requezt extends Model
{
  use SoftDeletes;

  protected $table = 'requests';
  protected $dates = ['deleted_at'];
  protected $fillable = ['id_doctor','id_paciente','fecha','hora','mensaje','id_usuario'];

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

  public function studies()
  {
    return $this->belongsToMany('SIAM\Study','studyrequests','id_request', 'id_study');
  }

}
