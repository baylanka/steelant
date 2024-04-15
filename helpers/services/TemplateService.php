<?php

namespace helpers\services;

use helpers\pools\LanguagePool;
use model\Template;

class TemplateService
{
    public static function getTemplateByFillingDataById($templateId, $data,$language, $mode)
    {
        $template = Template::getById($templateId);
        $templatePath = $template->getTemplateFilePath();
        ob_start();
        extract($data);
        require $templatePath;
        return ob_get_clean();
    }

    public static function getConnectorTemplateBy(int $id, string $language, $mode)
    {
        $language = LanguagePool::getByLabel($language)->getLabel();
        $connectorDTO = ConnectorService::getDTOById($id, $language, ' | ');
        if(empty($connectorDTO->templateId)){
            return null;
        }

        $data = [
            'connector' => $connectorDTO,
        ];

        return self::getTemplateByFillingDataById($connectorDTO->templateId, $data,$language, $mode);
    }

    public static function getAdOnTemplateBy(int $id, string $language, $mode)
    {
        $language = LanguagePool::getByLabel($language)->getLabel();
        $adOnDTO = AdOnService::getDTOById($id, $language, ' | ');
        if(empty($adOnDTO->templateId)){
            return null;
        }

        $data = [
            'ad_on_content' => $adOnDTO,
        ];

        return self::getTemplateByFillingDataById($adOnDTO->templateId, $data,$language, $mode);
    }

    public static function getAllLangConnectorTemplates(int $connectorId, $mode=Template::MODE_EDIT)
    {
        $templates = [];
        //germany template
        $languageDe = LanguagePool::GERMANY()->getLabel();
        $templateDe = self::getConnectorTemplateBy($connectorId, $languageDe, $mode);
        $templates[$languageDe] = is_null($templateDe) ? '' : $templateDe;

        //english US template
        $languageEnUs = LanguagePool::US_ENGLISH()->getLabel();
        $templateEnUs = self::getConnectorTemplateBy($connectorId, $languageEnUs, $mode);
        $templates[$languageEnUs] = is_null($templateEnUs) ? '' : $templateEnUs;

        //french template
        $languageFr = LanguagePool::FRENCH()->getLabel();
        $templateFr = self::getConnectorTemplateBy($connectorId, $languageFr, $mode);
        $templates[$languageFr] = is_null($templateFr) ? '' : $templateFr;

        //english UK template
        $languageEnUK = LanguagePool::UK_ENGLISH()->getLabel();
        $templateEnUk = self::getConnectorTemplateBy($connectorId, $languageEnUK, $mode);
        $templates[$languageEnUK] = is_null($templateEnUk) ? '' : $templateEnUk;

        return $templates;
    }

    public static function getAllLangAdOnTemplates(int $addOnId, $mode=Template::MODE_EDIT)
    {
        $templates = [];
        //germany template
        $languageDe = LanguagePool::GERMANY()->getLabel();
        $templateDe = self::getAdOnTemplateBy($addOnId, $languageDe, $mode);
        $templates[$languageDe] = is_null($templateDe) ? '' : $templateDe;

        //english US template
        $languageEnUs = LanguagePool::US_ENGLISH()->getLabel();
        $templateEnUs = self::getAdOnTemplateBy($addOnId, $languageEnUs, $mode);
        $templates[$languageEnUs] = is_null($templateEnUs) ? '' : $templateEnUs;

        //french template
        $languageFr = LanguagePool::FRENCH()->getLabel();
        $templateFr = self::getAdOnTemplateBy($addOnId, $languageFr, $mode);
        $templates[$languageFr] = is_null($templateFr) ? '' : $templateFr;

        //english UK template
        $languageEnUK = LanguagePool::UK_ENGLISH()->getLabel();
        $templateEnUk = self::getAdOnTemplateBy($addOnId, $languageEnUK, $mode);
        $templates[$languageEnUK] = is_null($templateEnUk) ? '' : $templateEnUk;

        return $templates;
    }

    public static function getDonwloadableFileTabTemplateByConnectorId(int $connectorId, $lang)
    {
        $connector = ConnectorService::getDTOById($connectorId, $lang);
        $templatePath =  basePath("views/admin/connectors/assets/edit.downloadable_files_tab.view.php");
        ob_start();
        require $templatePath;
        return ob_get_clean();
    }
}