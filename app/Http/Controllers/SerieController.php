<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Serie;
use Auth;
use Illuminate\Support\Str;
use Request;

class SerieController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$series = Serie::orderBy('updated_at','desc')->with('user')->paginate(10);
		return view('series.index')->withSeries($series);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('series.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$serie = new Serie;
		$serie->title = Request::input('title');
		$serie->description = Request::input('description');
		$serie->cover = Request::input('cover');
		$serie->slug = Str::slug(Request::input('title') . "-" . time());
		$serie->user_id = Auth::user()->id;
		$serie->save();

		return redirect()->Route('story.create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$serie = Serie::where('slug',$slug)->with('stories')->with('user')->first();
		return view('series.show')->withSerie($serie);
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

}
