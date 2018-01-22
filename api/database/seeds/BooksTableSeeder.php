<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book1 = new \App\Book();
        $book1->name = "Clean Code";
        $book1->pageNum = 20;
        $book1->file = "CleanCode";
        $book1->image = null;

        $c1 = new \App\Chapter();
        $c1->book_id = "1";
        $c1->name = "Chapter 1";
        $c1->page = "10";
        $c1->save();

        $c2 = new \App\Chapter();
        $c2->book_id = 1;
        $c2->name = "Chapter 2";
        $c2->page = "20";
        $c2->save();

        $book2 = new \App\Book();
        $book2->name = "Relativity Document";
        $book2->pageNum = 10;
        $book2->file = "relativity";
        $book2->image = null;

        $note = new \App\Note();
        $note->book_id = "2";
        $note->page = "10";
        $note->note = "This is my random note!!";
        $note->save();

        $book1->save();
        $book2->save();
    }
}