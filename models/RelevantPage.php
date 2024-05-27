<?php

namespace model;

use model\BaseModel;
class RelevantPage extends BaseModel
{
    protected string $table = "relevant_pages";

    public int $id;
    public int $category_id;
    public int $relevant_category_id;
    public ?string $title;
    public ?string $description;
}