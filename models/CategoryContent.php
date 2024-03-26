<?php

namespace model;

use model\BaseModel;

class CategoryContent extends BaseModel
{
    protected string $table = "category_contents";

    public int $id;
    public int $leaf_category_id;
    public int $display_order_no;
    public string $type;
    public int $element_id;
    public ?int $template_id;

    const TYPE_CONNECTOR = "connector";
    const TYPE_ADD_ON_CONTENT = "add_on_content";
}