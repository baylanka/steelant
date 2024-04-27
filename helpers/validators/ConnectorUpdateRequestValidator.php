<?php

namespace helpers\validators;

use app\Request;
use helpers\repositories\ConnectorRepository;
use helpers\services\ResponseService;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;
use model\Connector;

class ConnectorUpdateRequestValidator
{
    /**
     * @throws \Exception
     */
    public static function validate(Request $request)
    {
        self::categoryValidation($request);
        self::nameValidation($request);
        self::gradeValidation($request);
        self::descriptionValidation($request);
        self::thicknessValidation($request);
        self::weightValidation($request);
        self::standardLengthValidation($request);
        self::maxTensileStrengthValidation($request);
        self::templateValidation($request);
        self::downloadableFilesValidation($request);
        self::otherAttrValidation($request);
    }

    private static function otherAttrValidation(Request $request)
    {
       self::subtitleValidation($request);
       self::footerValidation($request);
       self::pressureLoadValidation($request);
       self::deformationPathValidation($request);
    }


    private static function subtitleValidation(Request $request): void
    {
        if (
            (
                !$request->has('subtitle_de')
                && !$request->has('subtitle_en_gb')
                && !$request->has('subtitle_fr')
                && !$request->has('subtitle_en_us')
            )
            ||
            (
                empty($request->get('subtitle_de'))
                && empty($request->get('subtitle_en_gb'))
                && empty($request->get('subtitle_fr'))
                && empty($request->get('subtitle_en_us'))
            )
        )
        {
            return;
        }


        $arr = [];

        if (!$request->has('subtitle_de') || empty($request->get('subtitle_de'))) {
            $arr['subtitle_de'] = "Subtitle (in German) is required.";
        }

        if (!$request->has('subtitle_en_gb') || empty($request->get('subtitle_en_gb'))) {
            $arr['subtitle_en_gb'] = "Subtitle (in English UK) is required.";
        }

        if (!$request->has('subtitle_fr') || empty($request->get('subtitle_fr'))) {
            $arr['subtitle_fr'] = "Subtitle (in French) is required.";
        }

        if (!$request->has('subtitle_en_us') || empty($request->get('subtitle_en_us'))) {
            $arr['subtitle_en_us'] = "Subtitle (in English US) is required.";
        }

        if (empty($arr)) {
            return;
        }

        $message = 'Subtitle validation error: Fill all or leave empty.';

        ResponseUtility::response($message, 422, $arr);
    }
    private static function footerValidation(Request $request): void
    {
        if (
            (
                !$request->has('footer_de')
                && !$request->has('footer_en_gb')
                && !$request->has('footer_fr')
                && !$request->has('footer_en_us')
            )
            ||
            (
                empty($request->get('footer_de'))
                && empty($request->get('footer_en_gb'))
                && empty($request->get('footer_fr'))
                && empty($request->get('footer_en_us'))
            )
        )
        {
            return;
        }


        $arr = [];

        if (!$request->has('footer_de') || empty($request->get('footer_de'))) {
            $arr['footer_de'] = "Footer (in German) is required.";
        }

        if (!$request->has('footer_en_gb') || empty($request->get('footer_en_gb'))) {
            $arr['footer_en_gb'] = "Footer (in English UK) is required.";
        }

        if (!$request->has('footer_fr') || empty($request->get('footer_fr'))) {
            $arr['footer_fr'] = "Footer (in French) is required.";
        }

        if (!$request->has('footer_en_us') || empty($request->get('footer_en_us'))) {
            $arr['footer_en_us'] = "Footer (in English US) is required.";
        }

        if (empty($arr)) {
            return;
        }

        $message = 'Footer validation error: Fill all or leave empty.';

        ResponseUtility::response($message, 422, $arr);
    }
    private static function pressureLoadValidation(Request $request): void
    {
        if (
            (
                !$request->has('pressure_load_m')
                && !$request->has('pressure_load_i')
            )
            ||
            (
                empty($request->get('pressure_load_m'))
                && empty($request->get('pressure_load_i'))
            )
        )
        {
            return;
        }


        $arr = [];

        if (!$request->has('pressure_load_m') || empty($request->get('pressure_load_m'))) {
            $arr['pressure_load_m'] = "Pressure load  (metrics) is required.";
        }

        if (!$request->has('pressure_load_i') || empty($request->get('pressure_load_i'))) {
            $arr['pressure_load_i'] = "Pressure load  (imperial) is required.";
        }


        if (empty($arr)) {
            return;
        }

        $message = 'Pressure load validation error: Fill all or leave empty.';

        ResponseUtility::response($message, 422, $arr);
    }
    private static function deformationPathValidation(Request $request): void
    {
        if (
            (
                !$request->has('deformation_path_m')
                && !$request->has('deformation_path_i')
            )
            ||
            (
                empty($request->get('deformation_path_m'))
                && empty($request->get('deformation_path_i'))
            )
        )
        {
            return;
        }


        $arr = [];

        if (!$request->has('deformation_path_m') || empty($request->get('deformation_path_m'))) {
            $arr['deformation_path_m'] = "Deformation path (metrics) is required.";
        }

        if (!$request->has('deformation_path_i') || empty($request->get('deformation_path_i'))) {
            $arr['deformation_path_i'] = "Deformation path (imperial) is required.";
        }


        if (empty($arr)) {
            return;
        }

        $message = 'Deformation path validation error: Fill all or leave empty.';

        ResponseUtility::response($message, 422, $arr);
    }

    private static function downloadableFilesValidation(Request $request)
    {
        $downloadableArray = $request->get('downloadable', []);
        $downloadableFileURLArray = $request->get('downloadable_src', []);

        if(
            (
                empty($downloadableArray)
                ||
                !isset($downloadableArray['name'])
                ||
                empty(array_filter(array_values($downloadableArray['name'])))
            )
            &&
            empty($downloadableFileURLArray))
        {
            return;
        }

        if(!isset($downloadableArray['title']) || empty($downloadableArray['title']))
        {
            ResponseUtility::response('Label missing',422, [
                'Please assign a label to each level of the file hierarchy.'
            ]);
        }

        foreach($downloadableArray['title'] as $index => $each){
            $position = $index + 1;
            if(empty(array_filter(array_values($each)))){
                ResponseUtility::response("Label is missing on the position number: {$position}" ,422, [
                    'Please assign a label to each level of the file hierarchy.'
                ]);
            }
        }


    }

    private static function templateValidation(Request $request)
    {
        if(!$request->has('template') || empty($request->get('template'))){
            ResponseUtility::response('template missing',422, [
                'Please select a template on the 2nd tab to continue'
            ]);
        }
    }

    private static function weightValidation(Request $request)
    {
        $weightMetricArr = $request->get('weight_metrics');
        $weightImperialArr = $request->get('weight_imperial');
        $weightLabelArr = $request->get('weight_label');

        foreach ($weightMetricArr as $index => $value){
            if($index > 0 && (!isset($weightLabelArr[$index]) || empty($weightLabelArr[$index]))) {
                throw new \Exception("Can not leave weight labels empty unless first one");
            }

            if(empty($weightMetricArr[$index]) || empty($weightImperialArr[$index])){
                throw new \Exception("Both metrics & imperial weight values should be filled");
            }
        }
    }

    /**
     * @throws \Exception
     */
    private static function maxTensileStrengthValidation(Request $request): void
    {
        $minChar = 3;
        $maxChar = 200;
        self::maxTensileStrengthMetricsValidation($request, $minChar, $maxChar);
        self::maxTensileStrengthImperialValidation($request, $minChar, $maxChar);
    }

    private static function maxTensileStrengthMetricsValidation(Request $request, $minChar, $maxChar): void
    {
        if(!$request->has('max_tensile_strength_m') || empty($request->get('max_tensile_strength_m'))){
            return;
        }

        if(!ValidatorUtility::min($request->get('max_tensile_strength_m'), $minChar)){
            throw new \Exception("max_tensile_strength (metrics) must be at least {$minChar} characters");
        }

        if(!ValidatorUtility::max($request->get('max_tensile_strength_m'), $maxChar)){
            throw new \Exception("max_tensile_strength (metrics) can not be exceed {$maxChar} characters");
        }
    }

    private static function maxTensileStrengthImperialValidation(Request $request, $minChar, $maxChar): void
    {
        if(!$request->has('max_tensile_strength_i') || empty($request->get('max_tensile_strength_i'))){
            return;
        }

        if(!ValidatorUtility::min($request->get('max_tensile_strength_i'), $minChar)){
            throw new \Exception("max_tensile_strength (imperial) must be at least {$minChar} characters");
        }

        if(!ValidatorUtility::max($request->get('max_tensile_strength_i'), $maxChar)){
            throw new \Exception("max_tensile_strength_i (imperial) can not be exceed {$maxChar} characters");
        }
    }

    private static function standardLengthValidation(Request $request): void
    {
        $lengthMetricArr = $request->get('standard_length_metrics');
        $lengthImperialArr = $request->get('standard_length_imperial');
        $lengthLabelArr = $request->get('standard_length_label');

        foreach ($lengthMetricArr as $index => $value){
            if($index > 0 && (!isset($lengthLabelArr[$index]) || empty($lengthLabelArr[$index]))) {
                throw new \Exception("Can not leave standard length labels empty unless first one");
            }

            if(empty($lengthMetricArr[$index]) || empty($lengthImperialArr[$index])){
                throw new \Exception("Both metrics & imperial standard length values should be filled");
            }
        }
    }

    /**
     * @throws \Exception
     */
    private static function thicknessValidation(Request $request): void
    {
        $thicknessMetricArr = $request->get('thickness_metrics',[]);
        $thicknessImperialArr = $request->get('thickness_imperial',[]);
        $thicknessLabelArr = $request->get('thickness_label',[]);

        foreach ($thicknessMetricArr as $index => $value){
            if($index > 0 && (!isset($thicknessLabelArr[$index]) || empty($thicknessLabelArr[$index]))) {
                throw new \Exception("Can not leave thickness labels empty unless first one");
            }

            if(empty($thicknessMetricArr[$index]) || empty($thicknessImperialArr[$index])){
                throw new \Exception("Both metrics & imperial thickness values should be filled");
            }
        }
    }

    /**
     * @throws \Exception
     */
    private static function descriptionValidation(Request $request): void
    {
        $minChar = 3;
        $maxChar = 350;
        self::descriptionGermanValidation($request, $minChar, $maxChar);
        self::descriptionEnglishValidation($request, $minChar, $maxChar);
        self::descriptionFrenchValidation($request, $minChar, $maxChar);
    }

    private static function descriptionGermanValidation(Request $request, $minChar, $maxChar): void
    {
        if(!$request->has('description_de') || empty($request->get('description_de'))){
           return;
        }

        if(!ValidatorUtility::min($request->get('description_de'), $minChar)){
            throw new \Exception("description (de) must be at least {$minChar} characters");
        }

        if(!ValidatorUtility::max($request->get('description_de'), $maxChar)){
            throw new \Exception("description (de) can not be exceed {$maxChar} characters");
        }
    }


    private static function descriptionEnglishValidation(Request $request, $minChar, $maxChar): void
    {
        if(!$request->has('description_en') || empty($request->get('description_en'))){
            return;
        }

        if(!ValidatorUtility::min($request->get('description_en'), $minChar)){
            throw new \Exception("description (en) must be at least {$minChar} characters");
        }

        if(!ValidatorUtility::max($request->get('description_en'), $maxChar)){
            throw new \Exception("description (en) can not be exceed {$maxChar} characters");
        }
    }

    private static function descriptionFrenchValidation(Request $request, $minChar, $maxChar): void
    {
        if(!$request->has('description_fr') || empty($request->get('description_fr'))){
            return;
        }

        if(!ValidatorUtility::min($request->get('description_fr'), $minChar)){
            throw new \Exception("description (fr) must be at least {$minChar} characters");
        }

        if(!ValidatorUtility::max($request->get('description_fr'), $maxChar)){
            throw new \Exception("description (fr) can not be exceed {$maxChar} characters");
        }
    }


    private static function gradeValidation(Request $request): void
    {
        if(!$request->has('grade') || empty($request->get('grade'))){
            throw new \Exception("grade is required to update.");
        }

        if(!ValidatorUtility::min($request->get('grade'), 3)){
            throw new \Exception("grade must be at least 3 characters");
        }

        if(!ValidatorUtility::max($request->get('grade'), 100)){
            throw new \Exception("grade can not be exceed 100 characters");
        }


    }
    private static function categoryValidation(Request $request): void
    {
        if(!$request->has('category') || empty($request->get('category'))){
            throw new \Exception("category is required to update.");
        }
    }
    private static function nameValidation(Request $request): void
    {
        if(!$request->has('name') || empty($request->get('name'))){
            throw new \Exception("name is required to update.");
        }

        if(!ValidatorUtility::min($request->get('name'), 2)){
            throw new \Exception("name must be at least 3 characters");
        }

        if(!ValidatorUtility::max($request->get('name'), 100)){
            throw new \Exception("name can not be exceed 100 characters");
        }

        $name = $request->get('name');
        $connectorId = $request->get('id');
        $categoryId = $request->get('category');
        if(!ConnectorRepository::isNameUnique($categoryId, $name, $connectorId)){
            ResponseUtility::response('Connector name is duplicated',422, [
                "already there is a connector with the `same name` for the category"
            ]);
        }
    }
}