<?php

namespace model;

use model\BaseModel;

class Order extends BaseModel
{
    public int $id;
    public string $project;
    public string $status;
    public string $sheet_pile_name;
    public int $connector_id;
    public string $connector_s_length;
    public int $user_id;
    public int $number_of_piles;
    public ?string $delivery_address;
    public ?string $postal_code;
    public ?string $country;
    public string $delivery_date;
    public string $created_at;
    public string $updated_at;


    public const STATUS_PENDING = "pending";
    public const STATUS_REJECTED = "rejected";
    public const STATUS_COMPLETED = "completed";

}