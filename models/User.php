<?php

namespace model;

use model\BaseModel;
class User extends BaseModel
{
    protected string $table = "users";

    public string $title;
    public string $type;
    public string $name;
    public string $job_position;
    public string $division;
    public string $company_name;
    public string $country_or_state;
    public string $email;
    public string $website;
    public string $phone;
    public string $user_name;
    public string $password;
    public string $newsletter;




    const USER ="user";
    const ADMIN = "admin";


}