<?php

namespace model;

use model\BaseModel;

class AddOnContent extends BaseModel
{
    protected string $table = "add_on_contents";
    public string $title;
    public string $description;
}