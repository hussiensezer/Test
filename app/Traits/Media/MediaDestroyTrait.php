<?php
namespace App\Traits\Media;

use Illuminate\Support\Facades\Storage;

trait MediaDestroyTrait
{

    /**
     * @param  $configDisk -> the file in config -> file
     * @param $directory
     * @param $mediaFile
     * @return NULL
     */
    public function deleteMedia($configDisk,$directory,$mediaFile)
    {
       return Storage::disk($configDisk)->delete($directory . '/' . $mediaFile);
    }

}
