<?php
namespace App\Traits\Media;

use Illuminate\Http\Request;

trait MediaUpdateTrait
{
    use MediaDestroyTrait, MediaUploadingTrait;

    /**
     * @param $media -> file of photo come from request
     * @param  $configDisk -> the file in config -> file
     * @param  $directory -> the file will stored in
     * @param  $columnInDB -> the name of image in database table to delete from file Or Request If He Not Updated New Image
     * @param Request $request
     * @return string
     */
    public function UpdateMedia($media,$configDisk,$directory,$columnInDB,Request $request): string
    {
        if($request->hasFile($media)) {

            $this->deleteMedia($configDisk,$directory, $columnInDB);
            return $this->storeMedia($request->$media, $configDisk,$directory);


        }else {
            return $columnInDB;
        }


    }

}
