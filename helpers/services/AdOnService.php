<?php

namespace helpers\services;

use helpers\dto\AdOnDTO;
use model\AdOnContent;

class AdOnService
{
    public static function getAddOnContentAssociatedData($id)
    {
        $addOnContent = AdOnContent::getById($id);
        if ($addOnContent) {
            $addOnContent->setCategory();
            $addOnContent->setMetaCollection();
        }

        return $addOnContent;
    }

    public static function getDTOById(int $id, string $lang, $separator = ' > ')
    {
        $addOnContent = self::getAddOnContentAssociatedData($id);
        return new AdOnDTO($addOnContent, $lang, $separator);
    }
}