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
    const SAVE_IMG_TYPE = 'jpeg';

    /**
     * @param $pdfsStorage
     * @param $savePdfAs
     * @param $fileName
     * @return bool
     */
    public static function ConvertNSave($pdfsStorage, $savePdfAs, $fileName)
    {
        try {
            $im = new \Imagick($pdfsStorage . $savePdfAs . '[0]');
            $im->setImageFormat(self::SAVE_IMG_TYPE);
            $im->trimImage(20000);
            //$im->resizeImage('350', '500',\Imagick::FILTER_LANCZOS, 1, true);
            $im->writeImage(public_path() . '/images/pdf/' . $fileName . self::SAVE_IMG_TYPE);
            return $fileName . self::SAVE_IMG_TYPE;
        } catch (\Exception $exception) {
            @mail('moreira.carlos09@gmail.com', 'Error with imagick', $exception->getMessage());
            return false;
        }
    }
}