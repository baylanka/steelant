<?php

namespace helpers\dto;

use model\Category;
use model\User;

class UserDTO
{
    public int $id;
    public string $name;


    public string $title;
    public string $type;
    public string $job_position;
    public string $division;
    public string $company_name;
    public string $country_or_state;
    public string $email;
    public string $website;
    public string $phone;
    public string $user_name;



    public function __construct(User $user)
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->title = $user->title;
        $this->type = $user->type;
        $this->job_position = $user->job_position;
        $this->division = $user->division;
        $this->company_name = $user->company_name;
        $this->country_or_state = $user->country_or_state;
        $this->email = $user->email;
        $this->website = $user->website;
        $this->phone = $user->phone;
        $this->user_name = $user->user_name;
        $this->newsletter = $user->newsletter;
    }

}