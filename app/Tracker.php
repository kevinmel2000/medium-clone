<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model {

	protected $table = 'trackers';

	public function story()
	{
		return $this->belongsTo('App\Story');
	}

}
