<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
	protected $fillable = [
		'name',
		'description',
		'published_at',
		'expires_at'
	];

    protected $dates=['published_at'];
    protected $dates=['expires_at'];

    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::parde($date);
    }

    public function setExpiresAtAttribute($date)
    {
    	$this->attributes['expires_at'] = Carbon::parde($date);
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
    	$query->where('expires_at','<=',Carbon::now())
    }
    
}
