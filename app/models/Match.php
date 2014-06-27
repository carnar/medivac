<?php

class Match extends \Eloquent {
	protected $fillable = [];

	public function predictions()
    {
    	return $this->hasMany('Prediction');
    }
}