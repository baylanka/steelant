<?php

namespace helpers\services;

use helpers\repositories\ConnectorRepository;
use model\Media;

class ConnectorService
{
    public static function getSelectedConnectorExtraAttributes($id)
    {
        $connectorTemplates = ConnectorRepository::getConnectorTemplatesByConnectorId($id);
        return   [
            'template_id' => self::getSelectedTemplateId($connectorTemplates),
            'downloadable_files' => self::getDownloadableFiles($connectorTemplates),
        ];
    }

    private static function getSelectedTemplateId($collection)
    {
        return $collection[0]->template_id ?? 8;
    }

    private static function getDownloadableFiles($collection)
    {
        $files = [];
        foreach ($collection as $each){
            if(!isset($each->media_id) || $each->media_type !== Media::TYPE_FILE) continue;

            $files[$each->media_id]['title'][$each->language] =  $each->title ?? null;
            if(!isset($files[$each->media_id]['file'])){
                $files[$each->media_id]['file_asset_path'] = assets('storage/'. $each->media_path);
                $files[$each->media_id]['media_name'] =  $each->media_name;
            }
        }

        return array_values($files);
    }
}