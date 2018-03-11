<?php
namespace App\Repositories\Book;

use Illuminate\Http\Request;

interface BookmarkRepositoryContract{
	public function getAllBooks();
	public function getBookById();
	public function store(Request $requestData);
}