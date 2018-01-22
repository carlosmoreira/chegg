<?php

namespace App\Http\Controllers;


use App\Book;
use App\Chegg\ImagickHelper;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Mockery\Exception;

class BookController extends Controller
{
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
        return view('book/add', ['book' => new Book()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            //ini_set('max_execution_time', '300')
            $book = new Book();
            $book->name = $request->get('bookName');
            if($request->hasFile('bookPdfFile'))
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
            if($file)
                $file->move( $pdfsStorage , $savePdfAs );
            else
                throw new Exception('Error uploading file');

            //After the file is moved over into the storage/pdfs directory,
            //retrieve it with imagick and save the first page of the pdf as an image.

            $imageSaved = ImagickHelper::ConvertNSave($pdfsStorage,$savePdfAs,$fileName);

            if($imageSaved)
                $book->image = $imageSaved;

            if($book->save()    )
                return redirect('books/manage')->with('success',"Book saved successfully");
            else
                throw new Exception('unable to save book');
        }catch (Exception $exception){
            //variant_and($exception->getMessage());die();
            return back()->with(['error' => $exception->getMessage()]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
