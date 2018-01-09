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
 *
 * Goal - Finish by end of January
 * Numbers only on 'go to page'
 * Book filter
 * Replace image with self
 * Error when going back to books... check if var not switched
 * Have the left menu hide first instead of show
 * Clever way to hide bottom bar
 * Add Manage section
 * Upload PDF
 * Save To DB
 *
 */

Route::get('/', function () {
    return view('app/index');
})->middleware('auth');

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('books/manage', 'BookController@manage');
    Route::resource('books', 'BookController');
});

