<?php

namespace helpers\services;

use model\Template;

class TemplateService
{
    public static function getTemplateByFillingDataById($templateId, $data)
    {
        $template = Template::getById($templateId);
        $templatePath = $template->getTemplateFilePath();
        ob_start();
        extract($data);
        require $templatePath;
        return ob_get_clean();
    }
}