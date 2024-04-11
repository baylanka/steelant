<?php

namespace helpers\services;

use model\ContentTemplateMedia;
use model\Media;

class MediaService
{
    public static function isMediaAssociated($excludeTemplateMediaId, $mediaIdToCheck)
    {
        $sql = "
              SELECT COUNT(*) AS result_count FROM content_template_media
              WHERE id <> :id
              AND media_id = :media_id ;
        ";
        $conditions = ['id'=>$excludeTemplateMediaId, 'media_id'=>$mediaIdToCheck];
        $contentTemplateMediaCount = Media::queryAsArray($sql, $conditions)->first();
        return (int)$contentTemplateMediaCount['result_count'] > 0;
    }

    public static function getMediaFromContentTemplateMedia(ContentTemplateMedia $contentTemplateMedia)
    {
        $existingMedia = Media::getFirstBy(['path' => $contentTemplateMedia->temp_media->path]);
        if (!$existingMedia) {
            $contentTemplateMedia->temp_media->save();
            return $contentTemplateMedia->temp_media;
        }

        return $existingMedia;
    }
}