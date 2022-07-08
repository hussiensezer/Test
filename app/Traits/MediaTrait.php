<?php

namespace App\Traits;

use App\Traits\Media\MediaDestroyTrait;
use App\Traits\Media\MediaUpdateTrait;
use App\Traits\Media\MediaUploadingTrait;

trait MediaTrait
{
    use MediaUploadingTrait,MediaDestroyTrait,MediaUpdateTrait;
}
