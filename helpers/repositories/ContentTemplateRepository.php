<?php

namespace helpers\repositories;

use model\ContentTemplate;

class ContentTemplateRepository extends ContentTemplate
{
    public static function deleteContentTemplatesByContentId(int $contentId)
    {
        $prevContentTemplates = self::getAllBy(['content_id' => $contentId]);
        foreach ($prevContentTemplates as $eachPrev) {
            ContentTemplateMediaRepository::deleteTemplateMediaByContentTemplateId($eachPrev->id);
            $eachPrev->delete();
        }
    }
}