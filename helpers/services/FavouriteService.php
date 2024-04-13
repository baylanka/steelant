<?php

namespace helpers\services;

use model\UserConnectorFavourite;

class FavouriteService
{

    public static function getByUser($userId){

      return  UserConnectorFavourite::query("
                SELECT userconnectorfavourites.*, connectors.name AS connector_name,connectors.id AS connector_id, category_contents.leaf_category_id   
                FROM userconnectorfavourites 
                    LEFT JOIN connectors ON userconnectorfavourites.connector_id = connectors.id 
                    INNER JOIN category_contents ON connectors.id = category_contents.element_id 
                    WHERE userconnectorfavourites.user_id=:user_id AND category_contents.type = 'connector'",
          ["user_id"=>$userId])->get();

    }

}