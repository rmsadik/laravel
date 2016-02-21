<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/* Route::get('/hello',function(){
	return 'Hello World!';
});
 */
Route::get('hello', 'Hello@index');
Route::get('/hello/{name}', 'Hello@show');

Route::get('blade', function () { return view('page'); });

Route::get('blade', function () {
	return view('page',array('name' => 'Mohamed','day' => 'Friday'));
});


Route::group(['middleware' => ['web']], function () {
    //
});
