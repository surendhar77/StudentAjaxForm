<?php

use App\Http\Controllers\StudentAjaxController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('student');
// });

Route::get('/',[StudentAjaxController::class,'index'])->name('student');
Route::post('/student-add',[StudentAjaxController::class,'add'])->name('student.add');
// Route::get('/student_edit/{id}', [StudentAjaxController::class, 'edit'])->name('student.edit');
Route::post('student-update',[StudentAjaxController::class,'update'])->name('student.update');
Route::delete('student-delete/{id}',[StudentAjaxController::class,'destroy'])->name('student.delete');