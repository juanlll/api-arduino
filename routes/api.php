<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['jwt.auth'])->group(function(){
	Route::get('users','UserController@index');
});


Route::post('login','AuthenticateController@authenticate');

Route::get('records',function(){
	$records = App\Record::all();
	return json_encode(['records'=>$records,'count'=>$records->count()]);
});