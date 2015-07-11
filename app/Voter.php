<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
   protected $fillable = ['name','sex'];

   public function research()
    {
        return $this->hasOne('App\Research');
    }

}
