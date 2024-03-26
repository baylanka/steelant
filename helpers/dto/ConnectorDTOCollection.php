<?php

namespace helpers\dto;

class ConnectorDTOCollection
{
    public static function getCollection($connectors, $lang, $separator): array
    {
        $collection = [];
        foreach ($connectors as $connector){
            $connector = json_decode(json_encode($connector));
            $collection[] = new ConnectorDTO($connector, $lang, $separator);
        }
        return $collection;
    }
}