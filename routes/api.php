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

//Ticket's API
Route::get('/ticket','TicketController@index');
Route::post('/ticket','TicketController@store');
Route::get('/ticket/{ticket}','TicketController@show');
Route::patch('/ticket/{ticket}','TicketController@update');
Route::delete('/ticket/{ticket}','TicketController@destroy');
// Route::patch('/checkin/{ticket}','TicketController@isCheckin');
Route::patch('/ticket/{qrcode}/checkin','TicketController@redeem');

//Base Product's API
Route::get('/product','ProductController@index');
Route::post('/product','ProductController@store');
Route::get('/product/{product}','ProductController@show');
Route::patch('/product/{product}','ProductController@update');
Route::delete('/product/{product}','ProductController@destroy');

//Role's User API
Route::get('/role','RoleController@index');
Route::post('/role','RoleController@store');
Route::get('/role/{role}','RoleController@show');
Route::patch('/role/{role}','RoleController@update');
Route::delete('/role/{role}','RoleController@destroy');

//User's API
Route::get('/user','UserController@index');
Route::get('/user/{user}','UserController@show');
Route::patch('/user/{user}','UserController@update');
Route::delete('/user/{user}','UserController@destroy');
//
Route::post('/register','UserController@store');
Route::post('/login','UserController@login');
// Route::post('/logout','UserController@logout');