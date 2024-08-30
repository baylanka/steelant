<?php

namespace helpers\services;

use model\ExceptionalRegion;

class ExceptionalRegionService
{
    public static function update($categoryId, array $regions)
    {
        ExceptionalRegion::updateBy(['leaf_category_id' => $categoryId], ['is_deleted' => ExceptionalRegion::STATUS_DELETED]);

        foreach ($regions as $region) {
            if (ExceptionalRegion::existsBy([
                'leaf_category_id' => $categoryId,
                'region_lang_code' =>$region
            ])){
                ExceptionalRegion::updateBy([
                    'leaf_category_id' => $categoryId,
                    'region_lang_code' =>$region
                ],
                    ['is_deleted' => ExceptionalRegion::STATUS_NOT_DELETED]);
            }else{
                ExceptionalRegion::insert([
                    'leaf_category_id' => $categoryId,
                    'region_lang_code' =>$region,
                    'is_deleted' => ExceptionalRegion::STATUS_NOT_DELETED
                ]);
            }
        }

        ExceptionalRegion::deleteBy([
            'leaf_category_id' => $categoryId,
            'is_deleted' => ExceptionalRegion::STATUS_DELETED
        ]);
    }
}