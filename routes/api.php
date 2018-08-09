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
	$records = App\Record::orderBy('created_at', 'desc')->get();
	return json_encode([
		'records'=>$records,//ARRAY DE REGISTROS
		'count'=>$records->count(),// CANTIDAD DE REGISTROS
		
		'max_temp'=>$records->max('temp'),//MAX PROMEDIO
		'min_temp'=>$records->min('temp'),//MIN PROMEDIO

		'max_humidity'=>$records->min('humidity'),//MAX HUMEDAD
		'min_humidity'=>$records->min('humidity'),//MIN HUMEDAD

		'max_co2'=>$records->min('co2'),//MAX CO2
		'min_co2'=>$records->min('co2'),//MIN CO2

		'average_temp'=>($records->sum('temp')/$records->count()),//PROMEDIO DE TEMPERATURA
		'average_humidity'=>($records->sum('humidity')/$records->count()),// PROMEDIO DE HUMEDAD
		'average_co2'=>($records->sum('co2')/$records->count()),// PROMEDIO DE CO2
	]);
});