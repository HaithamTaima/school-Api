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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=>'auth'],function (){
    Route::post('login',[\App\Http\Controllers\Auth\AuthController::class,'login']);
    Route::post('register',[\App\Http\Controllers\Auth\AuthController::class,'register']);
});


Route::group(['prefix'=>'v1','middleware'=> 'auth:api'],function (){
    Route::get('user/{id}',[\App\Http\Controllers\UserController::class,'profile']);

    Route::resource('departments',\App\Http\Controllers\DepartmentController::class);
    Route::resource('teachers',\App\Http\Controllers\TeacherController::class);

    Route::resource('courses',\App\Http\Controllers\CourseController::class);

});
