<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
get('login',['as'=>'user.login','uses'=>'UserController@getLogin']);
post('login',['as'=>'user.postLogin','uses'=>'UserController@postLogin']);
Route::group(['middleware'=>'auth'],function(){
	Route::resource('user','UserController');
	Route::get('user/{username}/settings',['as'=>'user.setting','uses'=>'UserController@getSetting']);
});
