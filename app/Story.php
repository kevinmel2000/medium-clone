<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model {

	protected $table = 'stories';

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function serie()
	{
		return $this->belongsTo('App\Serie');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}
}
