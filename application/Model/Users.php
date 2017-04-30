<?php

namespace Mini\Model;

use Mini\Core\Model;

class Users extends Model
{
    protected $table = 'users';

    public static function getStatus($id)
    {
        $status = ['0'=>'Suspend','1'=>'Active'];

        return $status[$id];
    }
}