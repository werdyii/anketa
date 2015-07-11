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

    //protected $fillable = ['ratio'];
    
    /**
     * Get the voter record associated with the research.
     * 
     */
    public function voter()
    {
        return $this->belongsTo('App\Voter');
    }

    /**
     * Get the Poll record associated with the research.
     * 
     */
    public function poll()
    {
        return $this->belongsTo('App\Poll');
    }
    
    /**
    * Get the Proposals record associated whit the Research.
    * 
    */
    public function proposals()
    {
        return $this->belongsToMany('App\Proposal','research_proposal','research_id','proposal_id')
                    ->withPivot('ratio')
                    ->withTimestamps();
    }

}