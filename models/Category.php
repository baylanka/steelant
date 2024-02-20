<?php

namespace model;

use model\BaseModel;

class Category extends BaseModel
{
    protected string $table = "categories";

    public int $id;
    public string $name;
    public string $title;
    public int $level;
    public ?int $parent_category_id;

}