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

    public function setMedia($force=false)
    {
        if(
            !$force
            && isset(static::$relations['media'])
            && array_key_exists($this->id, static::$relations['media'])
            )
        {

                return;
        }

        $categoryId = $this->id;
        static::$relations['media'][$this->id] =  Media::getMediaByCategoryId($categoryId);
    }

    public function setThumbnail($thumbnail)
    {
        static::$relations['thumbnail'][$this->id] =  $thumbnail;
    }

    public function setBanner($banner)
    {
        static::$relations['banner'][$this->id] =  $banner;
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
        $thumbnail = $this->getThumbnail($force);
        if(is_null($thumbnail)){
            return assets("img/admin/no-image.png");
        }
        $fullPath = "storage/" . $thumbnail->path;
        return assets($fullPath);
    }

    public function getThumbnailImageName($force=false)
    {
        $thumbnail = $this->getThumbnail($force);
        if(is_null($thumbnail)){
            return "--- thumbnail icon image ---";
        }
        return $thumbnail->name;
    }
    public function getBannerUrl($force=false)
    {
        $banner = $this->getBanner($force);
        if(is_null($banner)){
            return assets("img/admin/no-image.png");
        }

        $fullPath = "storage/" . $banner->path;
        return assets($fullPath);
    }

    public function getBannerImageName($force=false)
    {
        $banner = $this->getBanner($force);
        if(is_null($banner)){
            return "--- banner image ---";
        }
        return $banner->name;
    }

    public function isLeafCategroy()
    {
        return !empty($this->title);
    }

    public function isPublished()
    {
        return $this->visibility == self::PUBLISHED;
    }

    private function getBanner($force=false)
    {
        $this->setMedia($force);
        if(!$force && isset(static::$extra['banner'][$this->id]))
        {
            return  static::$extra['banner'][$this->id];
        }

        $media = static::$relations['banner'][$this->id] ?? [];
        foreach ($media as $each){
            if($each->type != CategoryMedia::TYPE_BANNER){
                continue;
            }

            self::setBanner($each);
            return $each;
        }

        return null;
    }

    private function getThumbnail($force=false)
    {
        $this->setMedia($force);
        if(!$force && isset(static::$extra['thumbnail'][$this->id]))
        {
            return  static::$extra['thumbnail'][$this->id];
        }

        $media = static::$relations['media'][$this->id] ?? [];
        foreach ($media as $each){
            if($each->type != CategoryMedia::TYPE_ICON){
                continue;
            }

            self::setThumbnail($each);
            return $each;
        }

        return null;
    }

}