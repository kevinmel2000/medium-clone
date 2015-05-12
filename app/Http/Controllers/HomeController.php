<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Story;
use Illuminate\Http\Request;

class HomeController extends Controller {

	public function index()
	{
		$story = Story::orderBy('created_at','desc')->with('user')->paginate(12);
		return view('pages.home')->withStories($story);
	}
}
