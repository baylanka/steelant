<?php

namespace model;

use helpers\repositories\CategoryMediaRepository;

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

    public ?string $temp_thumbnail_image_tracker;
    public ?string $temp_banner_image_tracker;

    CONST UNPUBLISHED = 0;
    const PUBLISHED = 1;

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
        if(
            !$force
            && isset(static::$extra['media'])
            && array_key_exists($this->id, static::$extra['media'])
            )
        {

                return;
        }

        $categoryId = $this->id;
        static::$extra['media'][$this->id] =  Media::getMediaByCategoryId($categoryId);
    }

    public function setThumbnail($thumbnail)
    {
        static::$extra['thumbnail'][$this->id] =  $thumbnail;
    }

    public function setBanner($banner)
    {
        static::$extra['banner'][$this->id] =  $banner;
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

    public function update()
    {
        parent::save();
        $this->updateThumbnail();
        $this->updateBanner();

        unset($this->temp_icon_media);
        unset($this->temp_banner_media);
        unset($this->temp_thumbnail_image_tracker);
        unset($this->temp_banner_image_tracker);

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
    public function titleExists()
    {
        return !empty($this->title);
    }

    public function thumbnailExists($force=false)
    {
        $thumbnail = $this->getThumbnail($force);
        return !is_null($thumbnail);
    }

    public function bannerExists($force=false)
    {
        $banner = $this->getBanner($force);
        return !is_null($banner);
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

    public function isParent()
    {
        return self::existsBy(['parent_category_id'=>$this->id]);
    }

    private function getBanner($force=false)
    {
        $this->setMedia($force);
        if(!$force && isset(static::$extra['banner'][$this->id]))
        {
            return  static::$extra['banner'][$this->id];
        }

        $media = static::$extra['media'][$this->id] ?? [];
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

        $media = static::$extra['media'][$this->id] ?? [];
        foreach ($media as $each){
            if($each->type != CategoryMedia::TYPE_ICON){
                continue;
            }

            self::setThumbnail($each);
            return $each;
        }

        return null;
    }

    private function isThumbnailDeletable()
    {
        return !is_null($this->temp_thumbnail_image_tracker)
            && $this->temp_thumbnail_image_tracker != 'previous_state';
    }

    private function isThumbnailUpdatable()
    {
        return !is_null($this->temp_thumbnail_image_tracker)
            && $this->temp_thumbnail_image_tracker === 'changed'
            && isset($this->temp_icon_media)
            && !empty($this->temp_icon_media);
    }
    private function updateThumbnail()
    {
        if($this->isThumbnailDeletable()){
            CategoryMediaRepository::deleteThumbnailByCategoryId($this->id);
        }

        if($this->isThumbnailUpdatable()){
            $icon = $this->temp_icon_media->save();
            $categoryMedia = new CategoryMedia();
            $categoryMedia->category_id = $this->id;
            $categoryMedia->media_id = $icon->id;
            $categoryMedia->type = CategoryMedia::TYPE_ICON;
            $categoryMedia->save();
        }
    }
    private function isBannerDeletable()
    {
        return  !is_null($this->temp_banner_image_tracker)
            && $this->temp_banner_image_tracker != 'previous_state';
    }

    private function isBannerUpdatable()
    {
        return !is_null($this->temp_banner_image_tracker)
            && $this->temp_banner_image_tracker === 'changed'
            && isset($this->temp_banner_media)
            && !empty($this->temp_banner_media);
    }

    private function updateBanner()
    {
        if($this->isBannerDeletable()){
            CategoryMediaRepository::deleteBannerByCategoryId($this->id);
        }

        if($this->isBannerUpdatable()){
            $banner = $this->temp_banner_media->save();
            $categoryMedia = new CategoryMedia();
            $categoryMedia->category_id = $this->id;
            $categoryMedia->media_id = $banner->id;
            $categoryMedia->type = CategoryMedia::TYPE_BANNER;
            $categoryMedia->save();
        }
    }

}