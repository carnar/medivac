<?php 
class Position extends Eloquent
{
	protected $fillable = ['user_id', 'name', 'points', 'photo'];
	
	public function user()
    {
        return $this->belongsTo('User');
    }
}