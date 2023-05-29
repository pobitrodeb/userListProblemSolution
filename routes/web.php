<?php

use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/add-student', [StudentController::class, 'index']);
Route::post('/add-student', [StudentController::class, 'store'])->name('store.student');
Route::get('/get-students', function(){
    return view('students');
});
Route::get('editUser/{id}', [StudentController::class, 'editUser'])->name('editUser');
Route::post('update-data', [StudentController::class, 'updateUser'])->name('updateUser');
Route::get('/all-student', [StudentController::class, 'getStudents'])->name('getStudents');


