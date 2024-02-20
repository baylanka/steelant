<?php

namespace model;

use model\BaseModel;

class CategoryContentMedia extends BaseModel
{
    protected string $table = "category_content_media";
    public int $id;
    public int $content_id;
    public int $media_id;
    public string $placeholder_id;
}