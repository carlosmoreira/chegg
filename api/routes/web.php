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
 * Pull data as Json
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

/**
 * Delete after implementing API
 *
 * + A set of books
 * ++
 *
 */
Route::get('fakeData', function () {
    return [
        [
            "name" => "Relativity Document",
            "pageNum" => 10,
            "path" => "pdf/relativity.pdf",
            "image" => null,
            "chapters" => [
                [
                    "name" => "chapter 1: cool chapter",
                    "page" => 20
                ],
                [
                    "name" => "chapter 3: cool chapter 3",
                    "page" => 30
                ],
                [
                    "name" => "chapter 4: cool chapter 4",
                    "page" => 40
                ],
                [
                    "name" => "chapter 5: cool chapter 5",
                    "page" => 50
                ]
            ]
        ],
        [
            "name" => "Clean Code",
            "pageNum" => 20,
            "path" => "pdf/CleanCode.pdf",
            "image" => null,
            "notes" => [
                [
                    "page" => 1,
                    "note" => "Page 1: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur dicta dolores ipsam iusto nisi nobis pariatur sit sunt veniam! Ad, aliquam error et ipsam nam nobis officia quis quisquam.",
                    "insertDate" => "today 10am"
                ],
                [
                    "page" => 1,
                    "note" => "Page 1: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur dicta dolores ipsam iusto nisi nobis pariatur sit sunt veniam! Ad, aliquam error et ipsam nam nobis officia quis quisquam.",
                    "insertDate" => "today 10am"
                ],
                [
                    "page" => 2,
                    "note" => "Page 2: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur dicta dolores ipsam iusto nisi nobis pariatur sit sunt veniam! Ad, aliquam error et ipsam nam nobis officia quis quisquam.",
                    "insertDate" => "today 10am"
                ]
            ]
        ]
    ];
});