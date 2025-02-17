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


/*
Route::get('/hello', function () {
    //return view('welcome');
    return "hello";
});
Route::get('/users/id/{id}/name/{name}', function ($id,$name) {
    return 'User is: '. $name . ' With an id: ' . $id;
});

*/
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

 


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::Resource('todos', 'TodosController');

 
