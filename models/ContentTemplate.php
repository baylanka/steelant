<?php

namespace model;

use model\BaseModel;
class ContentTemplate extends BaseModel
{
    protected string $table = "content_templates";
    public string $language;
    public int $content_id;
    public int $template_id;

    public array $temp_content_template_media;
}