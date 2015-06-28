<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Poll extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'polls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
		'name',
		'description',
		'published_at',
		'expires_at'
	];

    // protected $dates = ['published_at'];
    // protected $dates = ['expires_at'];

    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::parse($date);
    }

    public function setExpiresAtAttribute($date)
    {
    	$this->attributes['expires_at'] = Carbon::parse($date);
    }


    public function scopePreview($query)
    {
    	$query->where('published_at','>',Carbon::now());
    }

    public function scopeRun($query)
    {
    	$query->where('expires_at','>',Carbon::now())
    		  ->where('published_at','<=',Carbon::now());
    }

    public function scopeEnd($query)
    {
    	$query->where('expires_at','<=',Carbon::now());
    }
    
}
