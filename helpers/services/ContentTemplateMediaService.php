<?php

namespace helpers\services;

use model\ContentTemplate;

class ContentTemplateMediaService
{

    public static function update(ContentTemplate $content_template): void
    {
        $contentTemplateMediaArray = $content_template->temp_content_template_media ?? [];
        foreach ($contentTemplateMediaArray as $each) {
            $each->content_template_id = $content_template->id;
            $media = MediaService::getMediaFromContentTemplateMedia($each);
            $each->media_id = $media->id;
            $each->save();
        }
    }
}