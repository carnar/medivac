<?php

class Match extends \Eloquent {
	protected $fillable = [];

	public function tournaments()
	{
		return $this->belongsToMany('Tournament');
	}

	public function predictions()
    {
    	return $this->hasMany('Prediction');
    }
}