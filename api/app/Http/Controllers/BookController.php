<?php

namespace App\Http\Controllers;


use App\Book;
use App\Http\Requests\AddBookRequest;
use App\Repositories\Book\BookRepository;
use Faker\Provider\File;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Mockery\Exception;

class BookController extends Controller
{
    private $books;
    /**
     *  @todo: Retrieve the book repository from the IOC 
     */
    public function __construct(BookRepository $bookRepository){
        $this->books = $bookRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function index()
    {
        return  Book::with('chapters', 'notes')->get();
    }

    public function manage(){
        return view('book/manage', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book/addEdit', ['book' => new Book()]);
    }

    /**
     * @param AddBookRequest $request
     * @return array
     */
    public function store(AddBookRequest $request)
    {
        try{
            ini_set('max_execution_time', '3000');
            $this->books->store($request);
            return ['redirectUrl' => 'books/manage', 'success' => 'Book saved successfully'];
        }catch (QueryException $exception){
            return ['error' => $exception->getMessage()];
        }catch (Exception $exception){
            return ['error' => $exception->getMessage()];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            return view('book/addEdit', ['book' => Book::findOrFail($id)]);
        }catch (\Exception $exception){
            return redirect('book/manage')->with('error','Unable to find specified book');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try{
            //var_dump($request->all());die();
            $book = Book::findOrFail($id);
            $book->fill($request->all());
            $book->save();
            //Stopped here.... finish update on server side post, then check through ajax
            if($request->ajax())
                return ['Success' => 'ok', 'book' => $book];
            else
                return redirect("/books/$id/edit")->with('success','Book updated successfully');
        }catch (MassAssignmentException $exception){
            return redirect("/books/$id/edit")->with('error', "Mass Assignment Error: " . $exception->getMessage());
        }catch (\Exception $exception){
            //var_dump($exception->getMessage());die();
            return redirect("/books/$id/edit")->with('error', $exception->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $book = Book::findOrFail($id);
            $book->delete();

            //Delete Book image and book PDF
            $bookImage = public_path() .'/images/pdf/' . $book->image;
            if(\File::exists($bookImage))
                \File::delete($bookImage);

            $pdfFile = storage_path() . '/pdfs/' . $book->file .'.pdf' ;
            if(\File::exists($pdfFile))
                \File::delete($pdfFile);

            return redirect('books/manage')->with('success',"Book Successfully Deleted");

        }catch (Exception $e){
            return redirect('books/manage')->with('error',$e->getMessage());
        }
    }
}
