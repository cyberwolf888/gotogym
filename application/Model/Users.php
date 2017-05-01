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

    public function getLastOperator()
    {
        $sql = "SELECT * FROM users WHERE type = 2 ORDER BY id DESC LIMIT 5";
        $query = $this->db->prepare($sql);
        $parameters=array();
        $query->execute($parameters);
        return $query->fetchAll();
    }
}