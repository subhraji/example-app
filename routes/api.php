<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Model\Student;
use App\Http\Controllers\StudentController;

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

Route::get('/students', function (){
   return  Student::all();
});

Route::post('/signup', [StudentController::class, 'signUp']);
Route::post('/signIn', [StudentController::class, 'login']);
