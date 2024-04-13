<?php

namespace helpers\validators;

use app\Request;
use helpers\utilities\ResponseUtility;

class AddOnContentStoreRequestValidator
{
    /**
     * @throws \Exception
     */
    public static function validate(Request $request)
    {
        self::categoryValidation($request);
        self::titleValidation($request);
        self::descriptionValidation($request);
        self::templateValidation($request);
    }

    private static function templateValidation(Request $request)
    {
        if(!$request->has('template') || empty($request->get('template'))){
            ResponseUtility::response('template missing',422, [
                'Please select a template on the 2nd tab to continue'
            ]);
        }
    }

    private static function descriptionValidation(Request $request)
    {
        $error = [];
        if(!$request->has('description_de') || empty($request->get('description_de'))){
            $error['description_de'] = 'description (de) is required to store';
        }

        if(!$request->has('description_fr') || empty($request->get('description_fr'))){
            $error['description_fr'] = 'description (fr) is required to store';
        }

        if(!$request->has('description_en_us') || empty($request->get('description_en_us'))){
            $error['description_en_us'] = 'description (English us) is required to store';
        }

        if(!$request->has('description_en_gb') || empty($request->get('description_en_gb'))){
            $error['description_en_gb'] = 'description (English UK) is required to store';
        }

        if(!empty($arr)){
            ResponseUtility::response('Description required', 422, $error);
        }
    }

    private static function titleValidation(Request $request)
    {
        $error = [];
        if(!$request->has('title_de') || empty($request->get('title_de'))){
            $error['title_de'] = 'title (de) is required to store';
        }

        if(!$request->has('fr') || empty($request->get('fr'))){
            $error['title_fr'] = 'title (fr) is required to store';
        }

        if(!$request->has('title_en_us') || empty($request->get('title_en_us'))){
            $error['title_en_us'] = 'title (English us) is required to store';
        }

        if(!$request->has('title_en_gb') || empty($request->get('title_en_gb'))){
            $error['title_en_gb'] = 'title (English UK) is required to store';
        }

        if(!empty($arr)){
            ResponseUtility::response('Title required', 422, $error);
        }
    }

    private static function categoryValidation(Request $request): void
    {
        if(!$request->has('category') || empty($request->get('category'))){
            throw new \Exception("category is required to store.");
        }
    }
}