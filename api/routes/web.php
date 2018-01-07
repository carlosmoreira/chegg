<?php

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
/**
 *
 * Todo:
 * Http Service Wrapper
 * Add admin section
 * Upload PDF
 * Save To DB
 */
Route::get('/', function () {
    return view('app/index');
});

Auth::routes();

Route::prefix('views')->group(function () {
    Route::get('/library', function () {
        return view('app/angularViews/library');
    });
    Route::get('/read', function () {
        return view('app/angularViews/pdfViewer');
    });
    Route::get('/viewer', function () {
        return view('app/angularViews/viewer');
    });
});

Route::resource('books', 'BookController');
