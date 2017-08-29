<?php

namespace Mini\Model;

use Mini\Core\Model;
use Mini\Model\Facility;

class GymCategory extends Model
{
    protected $table = 'gym_category';

    public function manage($gym_id)
    {
        $sql = "SELECT gc.id,g.fullname,c.label FROM gym_category AS gc JOIN gym AS g ON g.id = gc.gym_id JOIN category AS c ON c.id = gc.category_id WHERE g.id = ".$gym_id;
        $query = $this->db->prepare($sql);
        $parameters=array();
        $query->execute($parameters);
        return $query->fetchAll();
    }
}