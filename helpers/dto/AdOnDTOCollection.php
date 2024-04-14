<?php

namespace helpers\dto;

use helpers\services\AdOnService;

class AdOnDTOCollection
{
    public static function getCollection($addOnContents, $lang, $separator): array
    {
        $collection = [];
        foreach ($addOnContents as $addOnContent){
            $addOnContent = json_decode(json_encode($addOnContent));
            $collection[] = AdOnService::getDTOById($addOnContent->id, $lang, $separator);
        }
        return $collection;
    }
}