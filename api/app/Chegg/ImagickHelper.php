<?php
/**
 * Created by PhpStorm.
 * User: CarlosMoreira
 * Date: 1/21/2018
 * Time: 2:14 PM
 */

namespace App\Chegg;

class ImagickHelper
{
    /**
     * @param $pdfsStorage
     * @param $savePdfAs
     * @param $fileName
     * @return bool
     */
    public static function ConvertNSave($pdfsStorage, $savePdfAs, $fileName){
        try{
            $im = new \imagick($pdfsStorage . $savePdfAs . '[0]');
            $im->setImageFormat('jpg');
            $im->resizeImage('150', '200',\Imagick::FILTER_LANCZOS, 1);
            $im->writeImage(public_path().'/images/pdf/'. $fileName . '.jpg');
            return $fileName . '.jpg';
        }catch (\Exception $exception){
            @mail('moreira.carlos09@gmail.com', 'Error with imagic', $exception->getMessage());
            return false;
        }
    }
}