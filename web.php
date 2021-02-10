<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware'=>"auth"], function(){
  
 
  Route::get('/list','bikesController@list');
  Route::view('/add','add');
  Route::post('/add','bikesController@add');
  Route::get('/delete/{id}','bikesController@delete');
  Route::get('/edit/{id}','bikesController@edit');
  Route::put('/edit/{id}','bikesController@update');
  // Route::view('/register','auth/register');
  // Route::post('/register','bikesController@register');
  // Route::view('/login','auth/login');
  // Route::post('/login','bikesController@login');

  // Route::get('out',function(){
  //   session()->forget('user');
  //   return redirect('/');
  // }); 
  Route::get('/home', 'bikesController@index')->name('user');
  Route::get('/admin', 'adminController@index')->name('admin');
});
Auth::routes();
//Roles Auth


Route::get('/home','bikesController@index');
Route::get('/details/{id}','bikesController@details');
route::view('/wrongdata','wrongdata');
  
    
// Route::view('/edit','edit'); 


// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home','bikesController@index');

