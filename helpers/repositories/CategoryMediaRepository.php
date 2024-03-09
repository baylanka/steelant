<?php

namespace helpers\repositories;

use helpers\utilities\FileUtility;
use model\CategoryMedia;
use model\Media;

class CategoryMediaRepository extends CategoryMedia
{
    public static function deleteByCategoryId($categoryId)
    {
        $sql = "
                SELECT category_media.id AS cat_media_id, media.id AS media_id, media.path
                       FROM category_media
                            INNER JOIN media ON category_media.media_id = media.id
                        WHERE category_media.category_id = :category_id ;
                ";
        $params = ['category_id'=>$categoryId];
        $categoryMedia = self::queryAsArray($sql, $params)->get();

        foreach ($categoryMedia as $each){
            CategoryMedia::deleteById($each['cat_media_id']);
            Media::deleteById($each['media_id']);

            $mediaPath = storage_path("/public/" .$each['path']);
            FileUtility::deleteFile($mediaPath);
        }
    }

    public static function deleteThumbnailByCategoryId($categoryId)
    {
        self::deleteMediaTypeByCategoryId($categoryId, CategoryMedia::TYPE_ICON);
    }

    public static function deleteBannerByCategoryId($categoryId)
    {
        self::deleteMediaTypeByCategoryId($categoryId, CategoryMedia::TYPE_BANNER);
    }

    private static function deleteMediaTypeByCategoryId($categoryId, $type)
    {
        $sql = "
                SELECT category_media.id AS cat_media_id, media.id AS media_id, media.path
                       FROM category_media
                            INNER JOIN media ON category_media.media_id = media.id
                        WHERE category_media.category_id = :category_id 
                            AND category_media.type = :media_type ;
                ";
        $params = [
            'category_id'=>$categoryId,
            'media_type' => $type
        ];

        $categoryMedia = self::queryAsArray($sql, $params)->get();

        foreach ($categoryMedia as $each){
            CategoryMedia::deleteById($each['cat_media_id']);
            Media::deleteById($each['media_id']);

            $mediaPath = storage_path("/public/" .$each['path']);
            FileUtility::deleteFile($mediaPath);
        }
    }


}