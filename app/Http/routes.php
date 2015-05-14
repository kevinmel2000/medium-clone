<?php

Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
get('login',['as'=>'user.login','uses'=>'UserController@getLogin']);
post('login',['as'=>'user.postLogin','uses'=>'UserController@postLogin']);
get('register',['as'=>'user.register','uses'=>'UserController@getRegister']);
post('register',['as'=>'user.postRegister','uses'=>'UserController@postRegister']);
Route::resource('story','StoryController');

Route::group(['middleware'=>'auth'],function(){
	Route::get('logout',['as'=>'logout','uses'=>'UserController@logout']);
	Route::resource('user','UserController');
	Route::get('user/{username}/settings',['as'=>'user.setting','uses'=>'UserController@getSetting']);
	get('p/new-post',['as'=>'user.newStory','uses'=>'UserController@newStory']);
	post('p/new-post',['as'=>'user.storeStory','uses'=>'UserController@storeStory']);
});
