<?php

namespace helpers\repositories;

use helpers\services\MediaService;
use model\ContentTemplate;
use model\ContentTemplateMedia;
use model\Media;

class ContentTemplateMediaRepository extends ContentTemplateMedia
{
    public static function deleteTemplateMediaByContentTemplateId(int $contentTemplateId)
    {
        $contentTemplateMedia = ContentTemplateMedia::getAllBy(['content_template_id'=>$contentTemplateId]);
        foreach ($contentTemplateMedia as $each)
        {
            $associatedMediaId = $each->media_id;
            $each->delete();
            if(Media::existsBy(['id'=>$associatedMediaId]) && !MediaService::isMediaAssociated($each->id, $associatedMediaId)){
                Media::deleteById($associatedMediaId);
            }
        }
    }

    public static function deleteContentTemplateMediaByContentId(int $contentId)
    {
        $contentTemplates = ContentTemplate::getAllBy(['content_id' => $contentId]);
        foreach ($contentTemplates as $each) {
            //NOTE: DON'T DELETE ContentTemplate.
            ContentTemplateMediaRepository::deleteTemplateMediaByContentTemplateId($each->id);
        }
    }
}