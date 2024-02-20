<?php

namespace model;

use model\BaseModel;
class Template extends BaseModel
{
    protected string $table = "templates";
    public int $id;
    public string $path;
}