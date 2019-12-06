<?php
# @Date:   2019-10-22T16:48:41+01:00
# @Last modified time: 2019-10-23T11:57:06+01:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public function users(){
    return $this->BelongsToMany('App\User','user_role');
  }
}
