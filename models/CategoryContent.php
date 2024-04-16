<?php

namespace model;

use helpers\repositories\ContentTemplateRepository;
use model\BaseModel;

class CategoryContent extends BaseModel
{
    protected string $table = "category_contents";

    public int $id;
    public int $leaf_category_id;
    public int $display_order_no;
    public string $type;
    public int $element_id;

    const TYPE_CONNECTOR = "connector";
    const TYPE_ADD_ON_CONTENT = "add_on_content";

    public function delete()
    {
        //delete (content) element
        if($this->type == self::TYPE_CONNECTOR){
            Connector::deleteById($this->element_id);
        }else{
            AdOnContent::deleteById($this->element_id);
        }

        //delete previous content templates media, with its associated `media`
        ContentTemplateRepository::deleteContentTemplatesByContentId($this->id);

        //delete content
        parent::delete();
    }
}