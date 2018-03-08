<?php

namespace App\Repositories\Book;

use App\Book;
use App\Events\NewBookCreated;
use App\Http\Requests\AddBookRequest;
use Mockery\Exception;

class BookRepository implements BookRepositoryContract
{

    public function getAllBooks()
    {

    }

    public function getBookById()
    {

    }

    public function store(AddBookRequest $request)
    {
        //Move Into a Repository
        $book = new Book();
        $book->name = $request->get('name');
        if ($request->hasFile('bookPdfFile'))
            $file = $request->file('bookPdfFile');
        else
            throw new Exception('File is required');
        $fileName = str_random();
        $book->file = $fileName;
        $pdfsStorage = storage_path() . '/pdfs/';
        $savePdfAs = $fileName . '.pdf';

        /**
         * @var UploadedFile $file
         */
        if ($file)
            $file->move($pdfsStorage, $savePdfAs);
        else
            throw new Exception('Error uploading file');
        //End move into Repository

        if(!$book->save())
            throw new Exception("Unable to save book");

        event(new NewBookCreated($book,$pdfsStorage, $savePdfAs, $fileName));
    }

}