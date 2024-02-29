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

    const PUBLISHED = 1;
    CONST UNPUBLISHED = 2;

    public static function getFirstLevelCategories()
    {
        return parent::getAllBy(['level'=>1]);
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

}