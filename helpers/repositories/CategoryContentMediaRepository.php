<?php

namespace helpers\repositories;

use helpers\utilities\FileUtility;
use model\CategoryContentMedia;
use model\Media;

class CategoryContentMediaRepository extends CategoryContentMedia
{
    public static function deleteByContentId($contentId)
    {
        $sql = "
                SELECT category_content_media.id AS content_media_id, media.path
                     FROM category_content_media
                     INNER JOIN media ON category_content_media.media_id = media.id
                    WHERE category_content_media.content_id = :content_id ;
                ";
        $params = ['content_id'=>$contentId];
        $contentMedia = CategoryContentMedia::queryAsArray($sql,$params)->get();

        foreach ($contentMedia as $media){
            CategoryContentMedia::deleteById($media['content_media_id']);
            Media::deleteById($media['media_id']);

            $mediaPath = storage_path("/public/" .$media['path']);
            FileUtility::deleteFile($mediaPath);
        }
    }
}