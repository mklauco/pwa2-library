<?php

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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    

    Route::resource('books', App\Http\Controllers\BooksController::class);
    Route::resource('users', App\Http\Controllers\UsersController::class);
    Route::resource('authors', App\Http\Controllers\AuthorsController::class);
    Route::resource('printouts', App\Http\Controllers\BookPrintoutController::class);
    Route::resource('loans', App\Http\Controllers\BookLoanItemController::class);

    Route::get('book/report', [App\Http\Controllers\PDF\BookReportController::class, 'simplePDF'])->name('book.report.simplePDF');

    Route::get('user/export/', [App\Http\Controllers\UsersController::class, 'export'])->name('users.export.excel');

    Route::get('book/export/', [App\Http\Controllers\PDF\BookReportController::class, 'export'])->name('books.export.excel');
});
