<?php

namespace controllers;

use app\Request;
use model\BaseModel;
use model\Connector;
use model\ContentTemplateMedia;


class TestController extends BaseController
{
    public function test(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        $sql = "
            SELECT content_template_media.* FROM
                         content_templates
                     INNER JOIN content_template_media
                         ON content_templates.id = content_template_media.content_template_id
                     WHERE content_templates.language = 'fr';
            
        ";
        $results = BaseModel::queryAsArray($sql)->get();
        foreach ($results as $result){

            try{
                if(!isset($result['title']) || empty($result['title'])){
                    continue;
                }

                $db->beginTransaction();
                $title = str_replace('FEM simulation','Simulation FEM', $result['title']);
                ContentTemplateMedia::updateById($result['id'],[
                    'title' => $title
                ]);
                $db->commit();
            }catch (\Exception $ex){
                $db->rollBack();
            }



        }

    }
}