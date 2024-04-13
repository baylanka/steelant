<?php

namespace helpers\repositories;

use model\ContentTemplate;

class ContentTemplateRepository extends ContentTemplate
{
    public static function deleteContentTemplatesByContentId(array $contentTemplatesArray, int $contentId)
    {
        foreach ($contentTemplatesArray as $each){
            $prevContentTemplates = self::getAllBy(['content_id' => $contentId, 'language'=> $each->language]);
            foreach ($prevContentTemplates as $eachPrev) {
                if($each->template_id == $eachPrev->template_id) continue;

                ContentTemplateMediaRepository::deleteTemplateMediaByContentTemplateId($eachPrev->id);
                $eachPrev->delete();
            }
        }
    }
}