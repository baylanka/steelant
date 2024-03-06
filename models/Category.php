<?php

namespace model;

use model\BaseModel;

class Category extends BaseModel
{
    protected string $table = "categories";

    public int $id;
    public string $name;
    public ?string $title;
    public int $level;
    public ?int $parent_category_id;
    public ?int $display_order;
    public int $visibility;

    public ?Media $temp_icon_media;
    public ?Media $temp_banner_media;

    CONST UNPUBLISHED = 0;
    const PUBLISHED = 1;


    public static function getFirstLevelCategories()
    {
        return parent::getAllBy(['level'=>1]);
    }

    public function setChildren(array $children)
    {
        self::$extra[$this->id]['children'] = $children;
    }

    public function getChildren()
    {
        return self::$extra[$this->id]['children'] ?? [];
    }

    public function setMedia($force=false)
    {
        if(!$force && isset(static::$relations['media'])){
            return;
        }
        $categoryId = $this->id;
        static::$relations['media'] = Media::getMediaByCategoryId($categoryId);
    }

    public function save()
    {
        parent::save();
        $categoryId = $this->id;
        if(isset($this->temp_icon_media) && !empty($this->temp_icon_media)){
            $icon = $this->temp_icon_media->save();
            $categoryMedia = new CategoryMedia();
            $categoryMedia->category_id = $categoryId;
            $categoryMedia->media_id = $icon->id;
            $categoryMedia->type = CategoryMedia::TYPE_ICON;
            $categoryMedia->save();
        }

        if(isset($this->temp_banner_media) && !empty($this->temp_banner_media)){
            $banner = $this->temp_banner_media->save();
            $categoryMedia = new CategoryMedia();
            $categoryMedia->category_id = $categoryId;
            $categoryMedia->media_id = $banner->id;
            $categoryMedia->type = CategoryMedia::TYPE_BANNER;
            $categoryMedia->save();
        }

        unset($this->temp_icon_media);
        unset($this->temp_banner_media);

        return $this;
    }

    public function getNameByLang(string $language)
    {
        $nameArray = json_decode($this->name, true);
        if(!isset($nameArray[$language])){
            return "";
        }

        return $nameArray[$language];
    }

    public function getTitleByLang(string $language)
    {
        if(empty($this->title)){
            return "";
        }
        $titleArray = json_decode($this->title, true);
        if(!isset($titleArray[$language])){
            return "";
        }

        return $titleArray[$language];
    }

    public function getThumbnailUrl($force=false)
    {
        $this->setMedia($force);
        $media = static::$relations['media'];
        foreach ($media as $each){
            if($each->type == CategoryMedia::TYPE_ICON){
                static::$extra['thumbnail'] = $each;
                $fullPath = "storage/" . $each->path;
                return assets($fullPath);
            }
        }

        return assets("img/admin/no-image.png");

    }

    public function getBannerUrl($force=false)
    {
        $this->setMedia($force);
        $media = static::$relations['media'];
        foreach ($media as $each){
            if($each->type == CategoryMedia::TYPE_BANNER){
                static::$extra['banner'] = $each;
                $fullPath = "storage/" . $each->path;
                return assets($fullPath);
            }
        }

        return assets("img/admin/no-image.png");

    }

    public function getThumbnailImageName($force=false)
    {
        $this->setMedia($force);
        $medias = static::$relations['media'];
        foreach ($medias as $each){
            if($each->type == CategoryMedia::TYPE_ICON){
                static::$extra['thumbnail'] = $each;
                return $each->name;
            }
        }

        return "--- thumbnail icon image ---";
    }

    public function getBannerImageName($force=false)
    {
        $this->setMedia($force);
        $medias = static::$relations['media'];
        foreach ($medias as $each){
            if($each->type == CategoryMedia::TYPE_BANNER){
                static::$extra['banner'] = $each;
                return $each->name;
            }
        }

        return "--- banner image ---";
    }

    public function isLeafCategroy()
    {
        return !empty($this->title);
    }

    public function isPublished()
    {
        return $this->visibility == self::PUBLISHED;
    }

}