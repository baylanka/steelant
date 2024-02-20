<?php

namespace model;

use model\BaseModel;

class CategoryMedia extends BaseModel
{
    protected string $table = "category_media";
    public int $id;
    public int $category_id;
    public int $media_id;
    public string $type;


    const TYPE_ICON = "icon";
    const TYE_BANNER = "banner";
    const TYPE_GALLERY = "gallery";
}