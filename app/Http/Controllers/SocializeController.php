<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Request;
use Socialize;

class SocializeController extends Controller {
	public function getFacebook()
	{
		return Socialize::with('facebook')->redirect();
	}

	public function getFacebookaction()
	{
		$fb = Socialize::with('facebook')->user();
		$user = User::where('email',$fb->getEmail())->first();
		if ($user){
			Auth::loginUsingId($user->id,true);
			return redirect()->Route('home');
		}else{
			$user = new User;
			$user->email = $fb->getEmail();
			$user->name = $fb->getName();
			$user->username = Str::slug($fb->getName() . time());
			$user->password = Hash::make('defaultpassword');
			$avatar = file_get_contents(str_replace("type=normal", "width=500", $fb->getAvatar()));
			file_put_contents("images/" . Str::slug($fb->getName() . time()) . ".png", $avatar);
			$user->profilePicture = Str::slug($fb->getName() . time()) . ".png";
			$user->save();
			Auth::loginUsingId($user->id,true);
			return redirect()->Route('home');
		}
	}
}