<?php

class Prediction extends \Eloquent {
	protected $fillable = ['user_id', 'tournament_id', 'match_id', 'score_a', 'score_b'];

	public function user()
    {
        return $this->belongsTo('User');
    }

	public function match()
    {
        return $this->belongsTo('Match');
    }

}