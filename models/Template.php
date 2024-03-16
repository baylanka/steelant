<?php

namespace model;

use helpers\services\FileService;
use model\BaseModel;
class Template extends BaseModel
{
    protected string $table = "templates";
    public int $id;
    public string $path;
    public string $type;
    public int $thumbnail_media_id;
    public ?Media $temp_thumbnail_media;
//    public ?string $temp_template_file_tracker;
//    public ?string $temp_thumbnail_media_tracker;
    const TYPE_CONNECTOR = 1;
    const TYPE_ADD_ON = 2;

    public function setMedia($force=false)
    {
        if(!$force && isset($this->relations['media'])) {
            return;
        }

        $this->relations['media'] =  Media::getById($this->thumbnail_media_id) ?? null;
    }

    public function media($force=false)
    {
        $this->setMedia($force);
        return $this->relations['media'];
    }

    public function getThumbnailUrl($force=false): string
    {
        $thumbnail = $this->media($force);
        if(is_null($thumbnail)){
            return FileService::getNoImage();
        }
        $fullPath = "storage/" . $thumbnail->path;
        return assets($fullPath);
    }

    public function getThumbnailImageName($force=false)
    {
        $thumbnail = $this->media($force);
        if(is_null($thumbnail)){
            return "--- thumbnail icon image ---";
        }
        return $thumbnail->name;
    }

    public function getTemplateFilePath(): string
    {
        $storagePath = "/public/template_assets/" . $this->path;
        return storage_path($storagePath);
    }

    public function getTemplateFileContent()
    {
        $storagePath = "/public/template_assets/" . $this->path;
        return file_get_contents(storage_path($storagePath));
    }

    public function getTypeDescription()
    {
        switch($this->type){
            case self::TYPE_CONNECTOR:
                return "connector template";
            case self::TYPE_ADD_ON:
                return "add-on template";
            default:
                return "unknown";
        }
    }

    public function save()
    {
        $thumbnail = $this->temp_thumbnail_media->save();
        $this->thumbnail_media_id = $thumbnail->id;
        parent::save();

        unset($this->temp_thumbnail_media);
        return $this;
    }
}