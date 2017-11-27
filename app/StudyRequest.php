<?php

namespace SIAM;

use SIAM\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyRequest extends Model
{

  use SoftDeletes;

  protected $table = 'studyrequests';
  protected $dates = ['deleted_at'];
  protected $fillable = ['id_request','id_study'];

  /**
  * Get the request associated with the studyrequest.
  */
  public function request()
  {
    return $this->belongsTo('SIAM\Request','id_request');
  }

}
