<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Model\Student;
use App\Http\Controllers\StudentController;


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => ['auth:sanctum']], function () {

});

Route::get('/students', function (){
   return  Student::all();
});

Route::post('/signup', [StudentController::class, 'signUp']);
Route::post('/signIn', [StudentController::class, 'login']);
