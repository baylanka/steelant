<?php

namespace model;

use model\BaseModel;
class ContentTemplateMedia extends BaseModel
{
    protected string $table = "content_template_media";
    public int $content_template_id;
    public int $media_id;
    public string $placeholder_id;
    public ?string $title;

    public ?Media $temp_media;
}