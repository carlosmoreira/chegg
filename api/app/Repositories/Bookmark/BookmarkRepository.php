<?php
/**
 * Created by PhpStorm.
 * User: CarlosMoreira
 * Date: 3/8/2018
 * Time: 10:51 PM
 */

namespace App\Repositories\Book;


use App\Note;
use Illuminate\Http\Request;

class BookmarkRepository implements BookmarkRepositoryContract
{

    public function getAllBooks()
    {
        // TODO: Implement getAllBooks() method.
    }

    public function getBookById()
    {
        // TODO: Implement getBookById() method.
    }

    public function store(Request $request)
    {
        Note::create($request->all());
    }
}