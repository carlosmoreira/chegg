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
 * REFACTORing
 * Cean up controllrs
 *     - implement Repository pattern
 *     - Change PDF create to an observer??
 *     - on store method inplemetn request class
 * 
 * Numbers only on 'go to page'
 * Book filter
 * Replace image with self
 *
 * Save on next page or page change
 *  Client and Server
 * instead of updating on every page change, update on a check
 * to see if current page is greater than the maxPageRead
 *
 * New button to set max page read
 */


Route::get('/info', function () {
    phpinfo();
});

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
    Route::post('books/{book}/createBookmark', 'BookController@createBookmark');
    Route::get('books/manage', 'BookController@manage');
    Route::resource('books', 'BookController');
    Route::resource('bookmarks', 'NoteController');
});