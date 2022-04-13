<?php

use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ToastsController;
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

Route::get('/',[TeacherController::class, 'index'])->name('teachers.index');
Route::get('/teacher/create',[TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teacher/create',[TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teacher/{id}',[TeacherController::class, 'show'])->name('teachers.show');
Route::get('/campus', [SchoolsController::class, 'index'])->name('schools.index');
Route::get('/campus/{id}', [SchoolsController::class, 'show'])->name('schools.show');
Route::get('/plaintes', [ToastsController::class, 'index'])->name('toasts.index');


Route::get('/toast/create', [ToastsController::class, 'create'])->name('toasts.create');
Route::post('/toast/create', [ToastsController::class, 'store'])->name('toasts.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
