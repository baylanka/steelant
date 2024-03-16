<?php

namespace helpers\mappers;

use helpers\utilities\FileUtility;
use model\Media;
use model\Template;

class TemplateStoreRequestMapper
{
    public static function getModel(Request $request)
    {
        $template = new Template();
        $template->path = self::getTemplateFilePath($request);
        $template->type = Template::TYPE_CONNECTOR;
        $template->temp_thumbnail_media = self::getTemplateThumbnailMedia($request);
        return $template;
    }

    /**
     * @throws \Exception
     */
    private static function getTemplateFilePath(Request $request)
    {
        $file = $request->get('template');
        $fileOriginalName = FileUtility::getName($file);
        $fileName = "template_file_{$fileOriginalName}_" . time() . "." . FileUtility::getType($file);
        $path = "template_assets/" . $fileName;
        $target = storage_path("public/{$path}");
        FileUtility::upload($file, $target);
        return $path;
    }

    private static function getTemplateThumbnailMedia(Request $request)
    {
        $file = $request->get('thumbnail');
        $fileOriginalName = FileUtility::getName($file);
        $fileName = "template_thumbnail_{$fileOriginalName}_" . time() . "." . FileUtility::getType($file);
        $path = "template_assets/" . $fileName;
        $target = storage_path("public/{$path}");
        $type = Media::TYPE_IMAGE;
        return self::uploadFile($file, $target, $path, $type);
    }

    private static function uploadFile($file, $target, $path, $type)
    {
        FileUtility::upload($file, $target);

        $media = new Media();
        $media->type = $type;
        $media->name =  FileUtility::getName($file);
        $media->path = $path;
        return $media;
    }
    
}