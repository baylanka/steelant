<?php

namespace helpers\services;

use model\UserConnectorFavourite;

class FavouriteService
{

    public static function getByUser($userId){

      return  UserConnectorFavourite::query("SELECT userconnectorfavourites.*, connectors.name FROM userconnectorfavourites LEFT JOIN connectors ON userconnectorfavourites.connector_id = connectors.id  WHERE userconnectorfavourites.user_id=:user_id ",["user_id"=>$userId])->get();

    }

}