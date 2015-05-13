<?php

Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
get('login',['as'=>'user.login','uses'=>'UserController@getLogin']);
post('login',['as'=>'user.postLogin','uses'=>'UserController@postLogin']);
Route::resource('user','UserController');
get('user/{username}/{slug}',['as'=>'user.story','uses'=>'UserController@story']);

Route::group(['middleware'=>'auth'],function(){
	Route::get('logout',['as'=>'logout','uses'=>'UserController@logout']);
	Route::get('user/{username}/settings',['as'=>'user.setting','uses'=>'UserController@getSetting']);
	get('p/new-post',['as'=>'user.newStory','uses'=>'UserController@newStory']);
	post('p/new-post',['as'=>'user.storeStory','uses'=>'UserController@storeStory']);
});
