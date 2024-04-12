<?php

namespace model;

use model\BaseModel;
class UserConnectorFavourite extends BaseModel
{

    public int $connector_id;
    public int $user_id;

}