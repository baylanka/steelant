<?php

namespace helpers\services;

use helpers\dto\ConnectorDTO;
use helpers\pools\LanguagePool;
use model\Connector;
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

    public static function getAllLangTemplates(\stdClass|Connector $connector)
    {
        $templates = [];

        //english US template
        $languageEnUs = LanguagePool::US_ENGLISH()->getLabel();
        $connectorDTOEnUs = new ConnectorDTO($connector, $languageEnUs, '>');
        $dataEnUs = [
            'connector' => $connectorDTOEnUs,
        ];
        $templateEnUs = self::getTemplateByFillingDataById($connectorDTOEnUs->templateId, $dataEnUs);
        $templates[$languageEnUs] =  $templateEnUs;


        //germany template
        $languageDe = LanguagePool::GERMANY()->getLabel();
        $connectorDTODe = new ConnectorDTO($connector, $languageDe, '>');
        $dataDe = [
            'connector' => $connectorDTODe,
        ];
        $templateDe = self::getTemplateByFillingDataById($connectorDTODe->templateId, $dataDe);
        $templates[$languageDe] = $templateDe;


        //french template
        $languageFr = LanguagePool::FRENCH()->getLabel();
        $connectorDTOFr = new ConnectorDTO($connector, $languageFr, '>');
        $dataFr = [
            'connector' => $connectorDTOFr,
        ];
        $templateFr =  self::getTemplateByFillingDataById($connectorDTOFr->templateId, $dataFr);
        $templates[$languageFr] = $templateFr;


        //english UK template
        $languageEnUK = LanguagePool::UK_ENGLISH()->getLabel();
        $connectorDTOEnUK = new ConnectorDTO($connector, $languageEnUK, '>');
        $dataEnUk = [
            'connector' => $connectorDTOEnUK,
        ];
        $templateEnUk =  self::getTemplateByFillingDataById($connectorDTOEnUs->templateId, $dataEnUk);
        $templates[$languageEnUK] = $templateEnUk;


        return $templates;
    }
}