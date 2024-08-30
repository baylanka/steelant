<?php

namespace model;

use model\BaseModel;
class ExceptionalRegion extends BaseModel
{
    protected string $table = "exceptional_regions";
    public int $leaf_category_id;
    public string $region_lang_code;
    public int $is_deleted;

    const STATUS_NOT_DELETED = 0;
    const STATUS_DELETED = 1;


    public array $temp_arrangedRegions = [];
    private function getArrangedRegions()
    {
        if(sizeof($this->temp_arrangedRegions)){
            return $this->temp_arrangedRegions;
        }

        $regions = self::getAll();

        $regionCollection = [];
        foreach ($regions as $region){
            $regionCollection[$region->leaf_category_id][] = $region->region_lang_code;
        }
        $path = storage_path("kt_" . time() .".txt");
        file_put_contents($path, "loaded");
        $this->temp_arrangedRegions = $regionCollection;
        return $this->temp_arrangedRegions;
    }

    public function isExceptionalRegion($category_id, $lang_code)
    {
        $arrangedRegions = $this->getArrangedRegions();
        foreach ($arrangedRegions as  $leafCategoryId => $regions){
            if($category_id != $leafCategoryId){
                continue;
            }

            return in_array($lang_code, $regions);
        }

        return false;
    }
}