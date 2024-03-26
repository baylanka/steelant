<?php

namespace helpers\filters;

use helpers\pools\LanguagePool;
use model\CategoryContent;
use model\Connector;

class ConnectorFilter
{
    public array $sqlArray;
    public array $params;
    private array $imperialLanguages;
    private array $metricsLanguages;
    public function __construct($lang, $search, $filter, $publishedStatus)
    {
        $this->setLanguageArrays();
        $this->setBasicSqlAttributes();
        $this->setPublishedStatusFilterAttribute($publishedStatus);
        $this->setFilterAttributes($lang, $search);
        $this->setOrderAttributes($lang, $filter);
    }


    private function getSQL()
    {
        $sql  = "SELECT " . implode(' , ', $this->sqlArray['columns']);
        $sql .= " FROM " . $this->sqlArray['base_table'];
        $sql .= " " . implode(' ',$this->sqlArray['join']);
        $sql .= " WHERE " . implode(' ', $this->sqlArray['whereClause']);

        if(!empty($this->sqlArray['order'])){
            $orderClauses = implode(' , ', $this->sqlArray['order']);
            $orderBySqlPhrase = " ORDER BY  " . $orderClauses;
            $sql .= $orderBySqlPhrase;
        }

        return $sql;
    }

    public function getResult()
    {
        $sql = $this->getSQL();
        return Connector::queryAsArray($sql, $this->params)->get();
    }

    private function setLanguageArrays()
    {
        $this->imperialLanguages = [LanguagePool::GERMANY()->getLabel(), LanguagePool::FRENCH()->getLabel(), LanguagePool::US_ENGLISH()->getLabel()];
        $this->metricsLanguages = [LanguagePool::UK_ENGLISH()->getLabel()];
    }

    private function setBasicSqlAttributes()
    {
        $this->params['type'] = CategoryContent::TYPE_CONNECTOR;

        $this->sqlArray['base_table'] = "connectors";
        $this->sqlArray['columns'][] = "category_contents.leaf_category_id";
        $this->sqlArray['columns'][] = "connectors.*";
        $this->sqlArray['join'][] = "INNER JOIN category_contents ON connectors.id = category_contents.element_id";
        $this->sqlArray['join'][] = "INNER JOIN categories cat1 ON  category_contents.leaf_category_id = cat1.id";
        $this->sqlArray['whereClause'][] = "category_contents.`type` = :type";
        $this->sqlArray['join'][] = "LEFT JOIN categories cat2 ON cat1.parent_category_id = cat2.id";
        $this->sqlArray['join'][] = "LEFT JOIN categories cat3 ON cat2.parent_category_id = cat3.id";
    }

    private function setOrderAttributes($lang, $filter)
    {
        $this->setCategoryOrderAttributes($lang, $filter);
        $this->setNameOrderAttribute($filter);
        $this->setGradeOrderAttribute($filter);
        $this->setThicknessOrderAttribute($lang, $filter);
        $this->setLengthOrderAttribute($lang, $filter);
    }

    private function setLengthOrderAttribute($lang, $filter)
    {
        if(!isset($filter['length']) || empty($filter['length']) || $filter['length'] === "none"){
            return;
        }

        $direction = $this->getDirection($filter['length']);

        switch($lang){
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::US_ENGLISH()->getLabel():
                $this->sqlArray['order'][] = "connectors.standard_lengths_m {$direction}";
                break;
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->sqlArray['order'][] = "connectors.standard_lengths_i {$direction}";
                break;
        }
    }

    private function setThicknessOrderAttribute($lang, $filter)
    {
        if(!isset($filter['thickness']) || empty($filter['thickness']) || $filter['thickness'] === "none"){
            return;
        }

        $direction = $this->getDirection($filter['thickness']);

        switch($lang){
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::US_ENGLISH()->getLabel():
                $this->sqlArray['order'][] = "connectors.thickness_m {$direction}";
                break;
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->sqlArray['order'][] = "connectors.thickness_i {$direction}";
                break;
        }
    }

    private function setGradeOrderAttribute($filter)
    {
        if(!isset($filter['grade']) || empty($filter['grade']) || $filter['grade'] === "none"){
            return;
        }

        $direction = $this->getDirection($filter['grade']);
        $this->sqlArray['order'][] = "connectors.grade {$direction}";
    }

    private function setNameOrderAttribute($filter)
    {
        if(!isset($filter['name']) || empty($filter['name']) || $filter['name'] === "none"){
            return;
        }

        $direction = $this->getDirection($filter['name']);
        $this->sqlArray['order'][] = "connectors.`name` {$direction}";
    }

    private function getDirection($direction)
    {
        if(in_array($direction, ['asc', 'ASC'])){
            return 'ASC';
        }else if(in_array($direction, ['desc', 'DESC'])){
            return 'DESC';
        }else{
            return 'ASC';
        }
    }
    private function setCategoryOrderAttributes($lang, $filter)
    {
        if(!isset($filter['category']) || empty($filter['category']) || $filter['category'] === "none"){
            return;
        }

        $direction = $this->getDirection($filter['category']);

        switch($lang){
            case LanguagePool::GERMANY()->getLabel():
                $this->sqlArray['order'][] = "COALESCE(LOWER(JSON_VALUE(cat1.name, '$.de')), LOWER(JSON_VALUE(cat2.name, '$.de')), LOWER(JSON_VALUE(cat3.name, '$.de')))  {$direction}";
                break;
            case LanguagePool::FRENCH()->getLabel():
                $this->sqlArray['order'][] = "COALESCE(LOWER(JSON_VALUE(cat1.name, '$.fr')), LOWER(JSON_VALUE(cat2.name, '$.fr')), LOWER(JSON_VALUE(cat3.name, '$.fr')))  {$direction}";
                break;
            case LanguagePool::UK_ENGLISH()->getLabel():
            case LanguagePool::US_ENGLISH()->getLabel():
                $this->sqlArray['order'][] = "COALESCE(LOWER(JSON_VALUE(cat1.name, '$.en')), LOWER(JSON_VALUE(cat2.name, '$.en')), LOWER(JSON_VALUE(cat3.name, '$.en')))  {$direction}";
                break;
        }
    }

    private function setFilterAttributes($lang, $search)
    {
        if(empty($search)){
            return;
        }
        $this->setCategoryNameFilterAttribuates($lang,$search);
        $this->setConnectorNameFilterAttributes($search);
        $this->setThicknessFilterAttribute($lang, $search);
        $this->setLengthFilterAttribute($lang, $search);
        $this->setWeightFilterAttribute($lang, $search);
        $this->setGradeFilterAttribute($search);
    }

    private function setPublishedStatusFilterAttribute($publishedStatus)
    {
        if($publishedStatus === 'none'){
            return;
        }

        $this->params['visibility'] = $publishedStatus;
        $this->sqlArray['whereClause'][] = " AND connectors.visibility = :visibility";
    }

    private function setWeightFilterAttribute($lang, $search)
    {
        $this->params['weight'] = is_numeric($search) ? $search : strtolower($search);

        if(in_array($lang, $this->imperialLanguages)){
            $this->sqlArray['whereClause'][] = "OR LOWER(connectors.`weight_i`) LIKE CONCAT('%', :weight, '%')";
        }else if(in_array($lang, $this->metricsLanguages)){
            $this->sqlArray['whereClause'][] = "OR LOWER(connectors.`weight_m`) LIKE CONCAT('%', :weight, '%')";
        }
    }

    private function setLengthFilterAttribute($lang, $search)
    {
        $this->params['length'] = is_numeric($search) ? $search : strtolower($search);

        if(in_array($lang, $this->imperialLanguages)){
            $this->sqlArray['whereClause'][] = "OR LOWER(connectors.`standard_lengths_i`) LIKE CONCAT('%', :length, '%')";
        }else if(in_array($lang, $this->metricsLanguages)){
            $this->sqlArray['whereClause'][] = "OR LOWER(connectors.`standard_lengths_m`) LIKE CONCAT('%', :length, '%')";
        }
    }

    private function setThicknessFilterAttribute($lang, $search)
    {
        $this->params['thickness'] = strtolower($search);

        if(in_array($lang, $this->imperialLanguages)){
            $this->sqlArray['whereClause'][] = "OR LOWER(connectors.`thickness_i`) LIKE CONCAT('%', :thickness, '%')";
        }else if(in_array($lang, $this->metricsLanguages)){
            $this->sqlArray['whereClause'][] = "OR LOWER(connectors.`thickness_m`) LIKE CONCAT('%', :thickness, '%')";
        }
    }

    private function setGradeFilterAttribute($search)
    {
        $this->params['grade'] = strtolower($search);
        $this->sqlArray['whereClause'][] = "OR LOWER(connectors.`grade`) LIKE CONCAT('%', :grade, '%')";
    }

    private function setConnectorNameFilterAttributes($search)
    {
        $this->params['name'] = strtolower($search);
        $this->sqlArray['whereClause'][] = "OR LOWER(connectors.`name`) LIKE CONCAT('%', :name, '%')";
    }


    private function setCategoryNameFilterAttribuates($lang, $search)
    {
        $this->params['cat_name'] = is_numeric($search) ? $search : strtolower($search);

        switch ($lang){
            case LanguagePool::GERMANY()->getLabel():
                $this->setNameDeWhereClause();
                break;
            case LanguagePool::FRENCH()->getLabel():
                $this->setNameFrWhereClause();
                break;
            case LanguagePool::UK_ENGLISH():
            case LanguagePool::US_ENGLISH():
                $this->setNameEnWhereClause();
                break;
        }

    }

    private function setNameFrWhereClause()
    {
        $this->sqlArray['whereClause'][] = "
                    AND (
                        LOWER(JSON_VALUE(cat1.name, '$.fr')) LIKE CONCAT('%', :cat_name, '%') OR
                        (cat2.name IS NOT NULL AND LOWER(JSON_VALUE(cat2.name, '$.fr')) LIKE CONCAT('%', :cat_name, '%')) OR
                        (cat3.name IS NOT NULL AND LOWER(JSON_VALUE(cat3.name, '$.fr')) LIKE CONCAT('%', :cat_name, '%'))
                    )  
        ";
    }
    private function setNameDeWhereClause()
    {
        $this->sqlArray['whereClause'][] = "
                    AND (
                        LOWER(JSON_VALUE(cat1.name, '$.de')) LIKE CONCAT('%', :cat_name, '%') OR
                        (cat2.name IS NOT NULL AND LOWER(JSON_VALUE(cat2.name, '$.de')) LIKE CONCAT('%', :cat_name, '%')) OR
                        (cat3.name IS NOT NULL AND LOWER(JSON_VALUE(cat3.name, '$.de')) LIKE CONCAT('%', :cat_name, '%'))
                    )  
        ";
    }
    private function setNameEnWhereClause()
    {
        $this->sqlArray['whereClause'][] = "
                    AND (
                        LOWER(JSON_VALUE(cat1.name, '$.us')) LIKE CONCAT('%', :cat_name, '%') OR
                        (cat2.name IS NOT NULL AND LOWER(JSON_VALUE(cat2.name, '$.us')) LIKE CONCAT('%', :cat_name, '%')) OR
                        (cat3.name IS NOT NULL AND LOWER(JSON_VALUE(cat3.name, '$.us')) LIKE CONCAT('%', :cat_name, '%'))
                    )  
        ";
    }
}