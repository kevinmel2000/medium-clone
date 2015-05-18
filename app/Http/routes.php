<?php
Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
get('user/{username}',['as'=>'user.show','uses'=>'UserController@show']);
Route::resource('story','StoryController');

Route::group(['middleware'=>'guest'],function(){
	Route::controller('socialize','SocializeController');
	get('login',['as'=>'user.login','uses'=>'UserController@getLogin']);
	post('login',['as'=>'user.postLogin','uses'=>'UserController@postLogin']);
	get('register',['as'=>'user.register','uses'=>'UserController@getRegister']);
	post('register',['as'=>'user.postRegister','uses'=>'UserController@postRegister']);
});

Route::group(['middleware'=>'auth'],function(){
	Route::get('logout',['as'=>'logout','uses'=>'UserController@logout']);
	Route::resource('user','UserController');
	Route::get('user/{username}/settings',['as'=>'user.setting','uses'=>'UserController@getSetting']);
	get('story/create',['as'=>'story.create','uses'=>'StoryController@create']);
	post('story/create',['as'=>'story.store','uses'=>'StoryController@store']);
});
