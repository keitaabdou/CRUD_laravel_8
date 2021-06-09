<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PresentationController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::get('/contact/list', [ContactController::class, 'index'])->name('contact.list');
Route::get('/contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::get('/contact/{id}/delete', [ContactController::class, 'destroy'])->name('contact.delete');
Route::post('/contact/{id}/update', [ContactController::class, 'update'])->name('contact.update');

Route::get('/presentation', [PresentationController::class, 'index'])->name('presentation');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
