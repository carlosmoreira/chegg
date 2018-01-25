<?php

namespace App\Http\Controllers;


use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery\Exception;

class StaticFileController extends Controller
{
    public function getFile(Request $request, Response $response, $type , $fileName){

        try{

            $storagePath = storage_path('pdfs/'. $fileName .'.' . $type );

            if( ! \File::exists($storagePath))
                throw new Exception('');

            $mimeType = mime_content_type($storagePath);

            $headers = array(
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'filename="'.$fileName.'"',
                'Content-Length' => \File::size($storagePath)
            );

            $fileContent = file_get_contents($storagePath);

            return \Response::stream(function() use($fileContent) {
                echo $fileContent;
            }, 200, $headers);

        }catch (\Exception $exception){
            abort(403, 'Unauthorized action.');
        }

    }
}
