<?php

namespace helpers\repositories;

use model\ContentTemplate;

class ContentTemplateRepository extends ContentTemplate
{
    public static function deleteContentTemplatesByContentId(int $contentId)
    {
        $contentTemplates = self::getAllBy(['content_id' => $contentId]);
        foreach ($contentTemplates as $each) {
            ContentTemplateMediaRepository::deleteTemplateMediaByContentTemplateId($each->id);
            $each->delete();
        }
    }
}