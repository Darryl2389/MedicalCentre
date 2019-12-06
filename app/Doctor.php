<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  public function user(){
    return $this->belongsTo('App\User','user_id');
  }

  public function visit(){
    return $this->haveMany('App\Visit');
  }
}
