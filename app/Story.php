<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model {

	protected $table = 'stories';

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function trackers()
	{
		return $this->hasMany('App\Trackers');
	}

}
