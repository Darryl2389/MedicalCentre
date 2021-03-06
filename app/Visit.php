<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  public function doctor(){
    return $this->belongsTo('App\Doctor', 'doctor_id');
  }

  public function patient(){
    return $this->belongsTo('App\Patient');
  }
}
