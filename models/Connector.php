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

    public float $weight_m;
    public ?string $weight_tolerance_m;
    public float $weight_i;
    public ?string $weight_tolerance_i;

    public float $thickness_m;
    public ?string $thickness_tolerance_m;
    public float $thickness_i;
    public ?string $thickness_tolerance_i;

    public float $standard_length_m;
    public ?string $standard_length_tolerance_m;
    public float $standard_length_i;
    public ?string $standard_length_tolerance_i;
}