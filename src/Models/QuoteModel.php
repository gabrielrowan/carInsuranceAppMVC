<?php

namespace CarInsurance\Models;

class QuoteModel
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

    public function acceptQuote(int $id)
    {
        $query = $this->db->prepare("UPDATE `quotes` SET `accepted` = 1 WHERE `id` = :id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function getCustomerID()
    {
        return $this->db->lastInsertId();
    }

    public function retrieveQuoteDetails(int $id)
    {
        $query = $this->db->prepare("SELECT `customer_name` FROM `quotes` WHERE `quotes`.`id`=" . $id);
        $query->execute();
        return $query->fetch();
    }


}