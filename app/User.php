<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'users';

	protected $fillable = ['name', 'email', 'password'];

	protected $hidden = ['password', 'remember_token'];

	public function stories()
	{
		return $this->hasMany('App\Story');
	}

	public function series()
	{
		return $this->hasMany('App\Serie');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	public function notifications()
	{
		return $this->hasMany('App\Notification');
	}
}
