<?php

namespace CarInsurance\Models;

class CoverTypeModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getCoverTypes()
    {
        $query = $this->db->prepare("SELECT * from `cover_type`;");
        $query->execute();
        return $query->fetchAll();
    }

    public function getCoverMultiplierByID(int $id)
    {
        $query = $this->db->prepare("SELECT `cover_multiplier` from `cover_type` WHERE `id` = " . $id);
        $query->execute();
        return $query->fetch();
    }
}