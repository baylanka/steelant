<?php

namespace helpers\services;

use helpers\dto\ConnectorDTO;
use helpers\pools\LanguagePool;
use model\Connector;
use model\Template;

class TemplateService
{
    public static function getTemplateByFillingDataById($templateId, $data, $mode)
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
        $connector = ConnectorService::getConnectorAssociatedData($id);
        $language = LanguagePool::getByLabel($language)->getLabel();
        $connectorDTO = new ConnectorDTO($connector, $language, ' | ');
        if(empty($connectorDTO->templateId)){
            return null;
        }
        $data = [
            'connector' => $connectorDTO,
        ];

        return self::getTemplateByFillingDataById($connectorDTO->templateId, $data, $mode);
    }

    public static function getAllLangTemplates(\stdClass|Connector $connector, $mode=Template::MODE_EDIT)
    {
        $templates = [];

        //germany template
        $languageDe = LanguagePool::GERMANY()->getLabel();
        $connectorDTODe = new ConnectorDTO($connector, $languageDe, '>');
        if(!is_null($connectorDTODe->templateId)){
            $dataDe = [
                'connector' => $connectorDTODe,
            ];
            $templateDe = self::getTemplateByFillingDataById($connectorDTODe->templateId, $dataDe, $mode);
        }else{
            $templateDe = '';
        }
        $templates[$languageDe] = $templateDe;


        //english US template
        $languageEnUs = LanguagePool::US_ENGLISH()->getLabel();
        $connectorDTOEnUs = new ConnectorDTO($connector, $languageEnUs, '>');
        if(!is_null($connectorDTOEnUs->templateId)){
            $dataEnUs = [
                'connector' => $connectorDTOEnUs,
            ];
            $templateEnUs = self::getTemplateByFillingDataById($connectorDTOEnUs->templateId, $dataEnUs, $mode);
        }else{
            $templateEnUs = '';
        }
        $templates[$languageEnUs] =  $templateEnUs;



        //french template
        $languageFr = LanguagePool::FRENCH()->getLabel();
        $connectorDTOFr = new ConnectorDTO($connector, $languageFr, '>');
        if(!is_null($connectorDTOFr->templateId)){
            $dataFr = [
                'connector' => $connectorDTOFr,
            ];
            $templateFr =  self::getTemplateByFillingDataById($connectorDTOFr->templateId, $dataFr, $mode);
        }else{
            $templateFr = '';
        }

        $templates[$languageFr] = $templateFr;


        //english UK template
        $languageEnUK = LanguagePool::UK_ENGLISH()->getLabel();
        $connectorDTOEnUK = new ConnectorDTO($connector, $languageEnUK, '>');
        if(!is_null($connectorDTOEnUs->templateId)) {
            $dataEnUk = [
                'connector' => $connectorDTOEnUK,
            ];
            $templateEnUk = self::getTemplateByFillingDataById($connectorDTOEnUs->templateId, $dataEnUk, $mode);
        }else{
            $templateEnUk = '';
        }
        $templates[$languageEnUK] = $templateEnUk;


        return $templates;
    }

    public static function getDonwloadableFileTabTemplate(ConnectorDTO $connector)
    {
        $templatePath =  basePath("views/admin/connectors/assets/edit.downloadable_files_tab.view.php");
        ob_start();
        require $templatePath;
        return ob_get_clean();
    }
}