<?php

namespace model;

use model\BaseModel;

class Media extends BaseModel
{
    protected string $table = "media";
    public string $type;
    public string $name;
    public string $path;
    public ?int $parent_media_id;

    const TYPE_IMAGE = "image";
    const TYPE_VIDEO = "video";
    const TYPE_FILE = "file";
}