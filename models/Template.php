<?php

namespace model;

use helpers\services\FileService;
use helpers\utilities\FileUtility;
use model\BaseModel;
class Template extends BaseModel
{
    protected string $table = "templates";
    public int $id;
    public string $path;
    public int $type;
    public int $thumbnail_media_id;
    public ?Media $temp_thumbnail_media;

    const TYPE_CONNECTOR = 1;
    const TYPE_ADD_ON = 2;

    const MODE_EDIT = 1;
    const MODE_VIEW = 2;


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
        $storagePath = "/public/" . $this->path;
        return storage_path($storagePath);
    }

    public function getTemplateFileContent()
    {
        $storagePath = "/public/" . $this->path;
        return file_get_contents(storage_path($storagePath));
    }

    public function getTypeDescription()
    {
        switch($this->type){
            case self::TYPE_CONNECTOR:
                return "connector template";
            case self::TYPE_ADD_ON:
                return "ad-on template";
            default:
                return "unknown";
        }
    }

    public function save()
    {
        if(isset($this->temp_thumbnail_media)){
            $thumbnail = $this->temp_thumbnail_media->save();
            $this->thumbnail_media_id = $thumbnail->id;
            unset($this->temp_thumbnail_media);
        }

        parent::save();
        return $this;
    }

    public function isDeletable()
    {
        return !ContentTemplate::existsBy(['template_id'=>$this->id]);
    }

    public static function deleteById(int $id)
    {
        $template = Template::getById($id);
        //delete template (php) issue
        $templatePath = storage_path("/public/" .$template->path);
        FileUtility::deleteFile($templatePath);
        // delete template entry
        $template->delete();

        //delete thumbnail
        Media::deleteById($template->thumbnail_media_id);
    }
}