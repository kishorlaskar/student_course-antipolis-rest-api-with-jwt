<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');

    Route::get('user', 'ApiController@getAuthUser');
    Route::get('students', 'StudentController@index');
    Route::post('students', 'StudentController@store');
    Route::get('students/{id}', 'StudentController@show');
    Route::put('students/{id}', 'StudentController@update');

    Route::get('courses', 'CourseController@index');
    Route::post('courses', 'CourseController@store');
    Route::get('courses/{id}', 'CourseController@show');
    Route::put('courses/{id}', 'CourseController@update');
    Route::delete('courses/{id}', 'CourseController@destroy');

   Route::get('specific-student','CourseRegistationController@index');
});


