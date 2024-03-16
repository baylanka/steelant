<?php

namespace helpers\services;

use helpers\utilities\FileUtility;
use model\Media;

class FileService
{
    public static function getNoImage()
    {
        return assets("img/admin/no-image.png");
    }
}