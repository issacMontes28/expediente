<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Study extends Model
{
  use SoftDeletes;

  protected $table = 'studies';
  protected $dates = ['deleted_at'];
  protected $fillable = ['nombre','folio','proposito','metodologia'];

  public function scopeFecha($query,$fecha1){
    if ($fecha1 != null) {
      $query->where('createndjsdnjksnbdjkbsad_at',"LIKE", "$fecha1%")->where('deleted_at', '=', null);
    }
  }
}
