<?php

namespace model;

use helpers\utilities\FileUtility;
use model\BaseModel;

class Media extends BaseModel
{
    protected string $table = "media";
    public string $type;
    public string $name;
    public string $path;
    public ?int $parent_media_id;

    const TYPE_IMAGE = "image";
    const TYPE_VIDEO = "video";
    const TYPE_FILE = "file";

    public static function getMediaByCategoryId($id)
    {
        global $container;
        $sql = "
                SELECT * FROM media
                    INNER JOIN category_media ON category_media.media_id = media.id
                    WHERE category_media.category_id = :category_id;
               ";
        $val = ["category_id"=>$id];
        $db = $container->resolve('DB');
        return json_decode(json_encode($db->queryAsArray($sql, $val)->get()));
    }

    public static function deleteById(int $id)
    {
        $media = self::getById($id);
        $mediaPath = storage_path("public/" . $media->path);
        FileUtility::deleteFile($mediaPath);
        $media->delete();
    }
}