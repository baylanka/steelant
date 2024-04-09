<?php

namespace helpers\services;

use helpers\dto\ConnectorDTO;
use helpers\repositories\ConnectorRepository;
use model\Connector;
use model\Media;

class ConnectorService
{
    public static function getConnectorAssociatedData($id)
    {
        $connector = Connector::getById($id);
        if($connector){
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
}