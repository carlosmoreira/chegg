<?php
namespace App\Repositories\Book;
use App\Http\Requests\AddBookRequest;

interface BookRepositoryContract{
	public function getAllBooks();
	public function getBookById();
	public function store(AddBookRequest $requestData);
}