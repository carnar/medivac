<?php

class Prediction extends \Eloquent {
	protected $fillable = [];

	public function user()
    {
        return $this->belongsTo('User');
    }

	public function match()
    {
        return $this->belongsTo('Match');
    }

}