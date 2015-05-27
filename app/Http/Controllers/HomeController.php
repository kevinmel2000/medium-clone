<?php namespace App\Http\Controllers;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Story;
use Auth;
use Piss;
use Request;
use Toastr;

class HomeController extends Controller {

	public function index()
	{
		$story = Story::orderBy('created_at','desc')->with('user')->with('serie')->simplePaginate(12);
		return view('pages.home')->withStories($story);
	}
}
