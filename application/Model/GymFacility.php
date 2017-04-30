<?php

namespace Mini\Model;

use Mini\Core\Model;
use Mini\Model\Facility;

class GymFacility extends Model
{
    protected $table = 'gym_facility';

    public function manage($gym_id)
    {
        $sql = "SELECT g.*,f.label FROM gym_facility AS g JOIN facility AS f ON g.facility_id = f.id WHERE g.gym_id = ".$gym_id;
        $query = $this->db->prepare($sql);
        $parameters=array();
        $query->execute($parameters);
        return $query->fetchAll();
    }
}