<?php

namespace helpers\repositories;

use model\RelevantPage;

class RelevantPageRepository extends RelevantPage
{
    public static function deleteRelevantPages($categoryId)
    {
        return self::deleteBy([
            'category_id' => $categoryId
        ]);
    }

    public static function updateRelevantPages($categoryId, array $pageIds)
    {
        self::deleteRelevantPages($categoryId);

        foreach ($pageIds as $pageId){
            self::insert([
                'category_id' => $categoryId,
                'relevant_category_id'=> $pageId
            ]);
        }
    }
}