<?php

namespace model;

use model\BaseModel;

class Connector extends BaseModel
{
    protected string $table = "connectors";

    public int $id;
    public string $name;
    public string $grade;
    public string $description;

    public array|string $weight_m;
    public array|string $weight_i;

    public string $thickness_m;
    public string $thickness_i;

    public string $standard_length_m;
    public string $standard_length_i;
}