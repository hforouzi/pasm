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

Route::auth();
/*
Route::resource('basedata','BasedataController');
Route::resource('executive','ExecutiveController');
Route::resource('contractor','ContractorController');
//Route::resource('activity','ActivityController');
Route::resource('routelist','RouteController');
Route::resource('menu','MenuController');
Route::post('executive/getdata', 'ExecutiveController@getdata')->name('executive.getdata');*/

/*
Route::get('activity/activity_calculator/{year}/{month}/{scope}',['uses'=>'ActivityController@activity_calculator','as'=>'activity.activity_calculator']);
Route::get('activity/activity_fine/{year}/{month}/{scope}',['uses'=>'ActivityController@activity_fine','as'=>'activity.activity_fine']);*/

Route::get('/', 'HomeController@index');/*
Route::post('executive/show_executive_table',['uses'=>'ExecutiveController@show_executive_table','as'=>'executive.show_executive_table']);
Route::post('activity/show_executive_table',['uses'=>'ActivityController@show_executive_table','as'=>'activity.show_executive_table']);
Route::post('activity/show_month',['uses'=>'ActivityController@show_month','as'=>'activity.show_month']);
Route::get('activity/create',['uses'=>'ActivityController@create','as'=>'activity.create']);
Route::post('activity/store',['uses'=>'ActivityController@store','as'=>'activity.store']);
Route::get('activity/output_excell/{year}/{month}/{scope}',['uses'=>'ActivityController@output_excell','as'=>'activity.output_excell']);
Route::get('activity/index',['uses'=>'ActivityController@index','as'=>'activity.index']);
Route::get('activity/show',['uses'=>'ActivityController@show','as'=>'activity.show']);

Route::post('routelist/get_data',['uses'=>'RouteController@get_data','as'=>'routelist.get_data']);
Route::post('menu/get_data',['uses'=>'MenuController@get_data','as'=>'menu.get_data']);*/
