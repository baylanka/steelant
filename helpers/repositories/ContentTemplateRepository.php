<?php

namespace helpers\repositories;

use model\ContentTemplate;

class ContentTemplateRepository extends ContentTemplate
{
    public static function deleteContentTemplatesByContentId(int $contentId)
    {
        $contentTemplates = ContentTemplate::getAllBy(['content_id'=>$contentId]);
        foreach ($contentTemplates as $each)
        {
            ContentTemplateMediaRepository::deleteTemplateMeidaByContentTemplateId($each->id);
            $each->delete();
        }
    }
}