<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\TeacherController;

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
Route::get('/', function() { return view('accueil');})->name('welcome');

Route::get('teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('teacher/create', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('teacher/{id}', [TeacherController::class, 'show'])->name('teacher.show');
Route::get('generate-pdf-teacher/', [TeacherController::class, 'getPDFteacher'])->name('generate-pdf-teacher');

Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint.index');
Route::get('/complaint/create', [ComplaintController::class, 'create'])->name('complaint.create');
Route::post('/complaint/create', [ComplaintController::class, 'store'])->name('complaint.store');

Route::get('/complaint/recherche', [ComplaintController::class, 'searchTeacherCreate'])->name('complaint.searchTeacher');
Route::post('/complaint/search-teacher', [ComplaintController::class, 'searchTeacher'])->name('complaint.search');
Route::post('/complaint/search-campus', [ComplaintController::class, 'searchCampus'])->name('complaint.search-school');
Route::get('generate-pdf', [ComplaintController::class, 'pdfView'])->name('generate-pdf');
Route::get('generate-research-teacher-pdf', [ComplaintController::class, 'pdfTeacherCreate'])->name('generate-research-pdf');
Route::get('generate-research-campus-pdf', [ComplaintController::class, 'pdfCampusCreate'])->name('generate-campus-pdf');


Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
