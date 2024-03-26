<?php

namespace model;

use model\BaseModel;
class TemplateMedia extends BaseModel
{
    protected string $table = "template_media";
    public int $template_id;
    public int $media_id;
    public string $placeholder_id;
    public ?string $title;
}