<?php

namespace helpers\dto;

use helpers\services\ConnectorService;

class ConnectorDTOCollection
{
    public static function getCollection($connectors, $lang, $separator): array
    {
        $collection = [];
        foreach ($connectors as $connector){
            $connector = json_decode(json_encode($connector));
            $collection[] = ConnectorService::getDTOById($connector->id, $lang, $separator);
        }
        return $collection;
    }
}