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
 *  - Idea, hang it from the top, with a button on the top menu to hide/close the nav
 * Clever way to hide bottom bar
 *
 * Save on next page or page change
 *  Client and Server
 * instead of updating on every page change, update on a check
 * to see if current page is greater than the maxPageRead
 *
 * New button to set max page read
 */

Route::get('/', function () {
    return view('app/index');
})->middleware('auth');

Route::get('/file/{type}/{file}', 'StaticFileController@getFile');

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