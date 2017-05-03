<?php

namespace Mini\Model;

use Mini\Core\Model;
use Mini\Libs\Helper;

class Gym extends Model
{
    protected $table = 'gym';

    public static function getCategory($id)
    {
        $category = new Category();

        return $category->getOne($id)->label;
    }

    public static function getStatus($id)
    {
        $status = ['0'=>'Suspend','1'=>'Active','3'=>'Not Complete'];

        return $status[$id];
    }

    public static function getImage($id)
    {
        $images = new Images();
        $img = $images->getOne(['gym_id'=>$id]);

        if($img){
            return $img->file;
        }else{
            return '';
        }
    }

    public function search($keyword, $category)
    {
        $_keyw = explode(' ', $keyword);
        $search = null;
        foreach ($_keyw as $key){
            $search.= 'fullname LIKE "%'.$key.'%" OR ';
        }
        $search = substr($search, 0, -4);

        $cat = '';
        if($category!=0){
            $cat = ' AND category_id = '.$category;
        }

        $sql = "SELECT * FROM $this->table WHERE ".$search.$cat." AND status = 1";
        $query = $this->db->prepare($sql);
        $query->execute([]);

        return $query->fetchAll();
    }

    public function newFacility()
    {
        $sql = "SELECT * FROM $this->table WHERE status = 1 ORDER BY id DESC LIMIT 12 ";
        $query = $this->db->prepare($sql);
        $query->execute([]);

        return $query->fetchAll();
    }

}