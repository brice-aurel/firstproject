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
Route::get('generate-pdf', [ComplaintController::class, 'pdfView'])->name('generate-pdf');
Route::get('generate-research-pdf', [ComplaintController::class, 'researchPDFView'])->name('generate-research-pdf');
Route::get('/complaint/create', [ComplaintController::class, 'create'])->name('complaint.create');
Route::post('/complaint/create', [ComplaintController::class, 'store'])->name('complaint.store');
Route::get('/complaint/search', [ComplaintController::class, 'search'])->name('complaint.search');

Route::post('category/create', [CategoryController::class, 'store'])->name('category.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
