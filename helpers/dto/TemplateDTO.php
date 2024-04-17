<?php

namespace helpers\dto;

use model\Template;

class TemplateDTO
{
    public int $id;
    public int $type;
    public string $typeStr;
    public string $thumbnail_url;
    public string $thumbnail_name;

    public function __construct(Template $template)
    {
        $this->id = $template->id;
        $this->type = $template->type;
        $this->typeStr = $template->getTypeStr();
        //updating media relation forcefully
        //newly set media object does not exist on earlier collection
        $template->setMedia(true);
        $this->thumbnail_url = $template->getThumbnailUrl();
        $this->thumbnail_name = $template->getThumbnailImageName();
        return $this;
    }
}