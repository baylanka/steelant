<?php

namespace helpers\services;

class ContentTemplateService
{
    public static function updateContentTemplates(array $temp_content_templates): void
    {
        foreach ($temp_content_templates as $content_template) {
            $content_template->save();
            ContentTemplateMediaService::update($content_template);
        }
    }
}