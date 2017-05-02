<?php

namespace Mini\Model;

use Mini\Core\Model;

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

}