<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model {

	protected $table = "series";

	public function stories()
	{
		return $this->hasMany('App\Story');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
