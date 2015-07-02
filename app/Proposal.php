<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = ['proposal'];

    public function poll()
    {
        return $this->belongsTo('App\Poll');
    }

}
