<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Story;
use App\User;
use Auth;
use Hash;
use Redirect;
use Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return redirect()->route('home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{
		$user = User::where('username',$username)
		->with(['stories'=>function($query){
			$query->orderBy('created_at','desc')->paginate(10);
		}])->first();
		
		return view('user.show')->withUser($user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getLogin()
	{
		return view('user.login');
	}

	public function postLogin()
	{
		// return Request::all();
		if (Auth::attempt(['email'=>Request::input('email'),'password'=>Request::input('password')],Request::input('rememberMe'))) {
			return redirect()->route('user.show',Auth::user()->username);
		} else {
			return "Username or password not valid";
		}
	}

	public function getSetting($username)
	{
		return "Settings for {$username}";
	}

	public function logout()
	{
		Auth::logout();
		return Redirect()->route('user.login');
	}

	public function getRegister()
	{
		return view('user.register');
	}

	public function postRegister()
	{
		$user = new User;
		$user->username = Request::input('username');
		$user->email = Request::input('email');
		$user->name = Request::input('name');
		$user->password = Hash::make(Request::input('password'));
		$user->quotes = "Jangan sampai lupa bahagia !";
		$user->save();
		Auth::loginUsingId($user->id,true);
		return redirect()->route('home');
	}
}
