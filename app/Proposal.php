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

	public function researches()
	{
		return $this->belongsToMany('App\Research','research_proposal','research_id','proposal_id')
		->withPivot('ratio')
		->withTimestamps();
	}

}
