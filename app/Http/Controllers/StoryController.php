<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Notification;
use App\Serie;
use App\Story;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Request;
use Xss;

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
		$series = Serie::where('user_id',Auth::user()->id)->get();
		return View('story.new')->withSeries($series);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$bottime = Request::input('bottime');
		$totaltime = time() - $bottime;

		if($totaltime < 10){
			return "disabled !";
		}else{
			$story = new Story;
			if (Request::input('serie') != "none"){
				$story->serie_id = Request::input('serie');
			}else{
				$story->serie_id = 0;
			}
			$slug = Str::slug(Request::input('title'));
			if ( Story::where('slug',$slug)->count() > 0){
				$slug = Str::slug(Request::input('title')) . "-" . time();
			}
			$story->title = Request::input('title');
			$story->slug = $slug;
			$story->content = Xss::clean(Request::input('content'));
			$story->user_id = Auth::user()->id;
			$story->commenter = "";
			$story->save();

			return redirect()->route('story.show',$story->slug);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$story = Story::where('slug',$slug)->with('user')->with('comments')->first();
		$story->bad_count = $story->bad_count + 1;
		$story->save();

		if ($story->serie_id == 0){
			$parents = Story::where('user_id',$story->user->id)->orderBy(DB::raw('RAND()'))->take(10)->get();
			return view('story.view')->withStory($story)->withParents($parents);
		}else{
			$parents = Story::where('serie_id',$story->serie_id)->get();
			$serie = Serie::find($story->serie_id);
			return view('story.series')->withStory($story)->withParents($parents)->withSerie($serie);
		}
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
		$series = Serie::where('user_id',Auth::user()->id)->get();
		if (Auth::user()->username == $story->user->username || Auth::user()->su == true){
			return view('story.edit')->withStory($story)->withSeries($series);
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
		if (Request::input('serie') != "none"){
			$story->serie_id = Request::input('serie');
		}else{
			$story->serie_id = 0;
		}
		$story->title = Request::input('title');
		$story->content = Xss::clean(Request::input('content'));
		$story->save();

		return redirect()->route('story.show',$story->slug);
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
		if ( Auth::check() && $story->user->username == Auth::user()->username || Auth::user()->su == true ){
			$story->delete();
			return redirect()->back();
		}else{
			return redirect()->back();
		}
	}

}
