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
    public ?int $display_order;
    public int $visibility;

    const PUBLISHED = 1;
    CONST UNPUBLISHED = 2;

    public static function getFirstLevelCategories()
    {
        return parent::getAllBy(['level'=>1]);
    }

}