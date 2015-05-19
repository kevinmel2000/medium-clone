<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Story;
use Auth;
use Illuminate\Support\Str;
use Xss;
use Request;

class StoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return redirect()->Route('home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View('story.new');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$story = new Story;
		$slug = Str::slug(Request::input('title')) . "-" . time();
		$story->title = Request::input('title');
		$story->slug = $slug;
		$story->content = Xss::clean(Request::input('content'));
		$story->user_id = Auth::user()->id;
		$story->save();

		return redirect()->route('home');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$story = Story::where('slug',$slug)->with('user')->first();
		return view('story.view')->withStory($story);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$story = Story::where('id',$id)->with('user')->first();
		if (Auth::user()->username == $story->user->username){
			return view('story.edit')->withStory($story);
		}else{
			return redirect()->back();
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$story = Story::find($id);
		$story->title = Request::input('title');
		$story->content = Xss::clean(Request::input('content'));
		$story->save();

		return redirect()->route('home');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$story = Story::where('id',$id)->with('user')->first();
		if ( Auth::check() && $story->user->username == Auth::user()->username ){
			$story->delete();
			return redirect()->back();
		}else{
			return redirect()->back();
		}
	}

}
