<?php

namespace helpers\repositories;

use model\ContentTemplateMedia;
use model\Media;

class ContentTemplateMediaRepository extends ContentTemplateMedia
{
    public static function deleteTemplateMeidaByContentTemplateId(int $contentTemplateId)
    {
        $contentTemplateMedia = ContentTemplateMedia::getAllBy(['content_template_id'=>$contentTemplateId]);
        foreach ($contentTemplateMedia as $each)
        {
            $associatedMediaId = $each->media_id;
            $each->delete();
            if(Media::existsBy(['id'=>$associatedMediaId])){
                Media::deleteById($associatedMediaId);
            }
        }
    }
}