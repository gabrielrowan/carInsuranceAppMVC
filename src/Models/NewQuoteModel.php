<?php

namespace CarInsurance\Models;

class NewQuoteModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function insertNewCustomerDetails(string $customerName, int $carTypeID, int $coverTypeID, string $quoteCost, int $carValue)
    {
        $query = $this->db->prepare("INSERT INTO `quotes` (`customer_name`, `car_type_id`, `cover_id`, `cost`, `car_value`)
VALUES (:name, :car_type_id, :cover_id, :cost, :car_value);");
        $query->bindParam(':name', $customerName);
        $query->bindParam(':car_type_id', $carTypeID);
        $query->bindParam(':cover_id', $coverTypeID);
        $query->bindParam(':cost', $quoteCost);
        $query->bindParam(':car_value', $carValue);
        $query->execute();
    }
}