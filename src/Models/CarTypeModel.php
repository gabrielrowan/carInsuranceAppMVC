<?php

namespace CarInsurance\Models;

class CarTypeModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getCarTypes()
    {
        $query = $this->db->prepare("SELECT * from `car_type`;");
        $query->execute();
        return $query->fetchAll();
    }

    public function getCarTypeMultiplierByID(int $id)
    {
        $query = $this->db->prepare("SELECT `type_multiplier` from `car_type` WHERE `id` = " . $id);
        $query->execute();
        return $query->fetch();
    }
}
