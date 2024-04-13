<?php

namespace helpers\services;

use app\Request;
use helpers\dto\ConnectorDTO;
use helpers\repositories\ConnectorRepository;
use model\Connector;
use model\Media;
use model\UserConnectorFavourite;

class ConnectorService
{
    public static function getConnectorAssociatedData($id)
    {
        $connector = Connector::getById($id);
        if ($connector) {
            $connector->setCategory();
            $connector->setMetaCollection();
        }

        return $connector;
    }

    public static function getDTOById(int $id, string $lang, $separator = '<')
    {
        $connector = self::getConnectorAssociatedData($id);
        return new ConnectorDTO($connector, $lang, '<');
    }


    public static function addToFavourite(Request $request)
    {
        UserConnectorFavourite::insert([
            "connector_id" => $request->get("id"),
            "user_id" => $_SESSION["user"]->id
        ]);
    }


    public static function isFavourite($connectorId)
    {
        $user_id = $_SESSION["user"]->id;
        $count = UserConnectorFavourite::query("SELECT COUNT(*) AS count FROM userconnectorfavourites WHERE connector_id = ".$connectorId." AND user_id =".$user_id)->first();

        if($count->count > 0){
            return true;
        }
        return false;
    }

    public static function deleteFavouriteById($id){

        UserConnectorFavourite::deleteById($id);
    }
}