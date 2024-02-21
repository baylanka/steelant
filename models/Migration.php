<?php

namespace model;

use model\BaseModel;
class Migration extends BaseModel
{
    public int $id;
    public string $name;
    public int $batch_number;
}