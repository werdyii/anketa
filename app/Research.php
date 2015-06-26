<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    /**
     * the attribute that are mass assignable
     * 
     * @ var array
     * 
     */

    protected $fillable = ['ratio'];
    
    /**
     * Get the voter record associated with the research.
     * 
     */
    protected function voters()
    {
        return $this->hasOne('App\Voter');
    }
    
    /**
     * Get the Proposal record associated whit the Research.
     * 
     */
     protected function proposals()
     {
         return $this->hasOne('App\Proposal');
     }
}