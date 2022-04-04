<?php


namespace CarInsurance\Models;

class AcceptQuoteModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function acceptQuote(int $id)
    {
        $query = $this->db->prepare("UPDATE `quotes` SET `accepted` = 1 WHERE `id` = :id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function getCustomerID()
    {
        $this->db->lastInsertId();
    }

}