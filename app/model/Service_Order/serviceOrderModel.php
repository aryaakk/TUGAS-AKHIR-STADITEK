<?php

namespace staditek\TugasAkhir\App\model\Service_Order;

use staditek\TugasAkhir\App\config\database;

class serviceOrderModel extends database
{
    private $table = 'tbl_service_order';

    public function showData()
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data)
    {
        $statement = self::$conn->prepare("INSERT INTO $this->table(reference_no, service_id, customer_id , service_date, service_status, total_amount, user_id ) VALUES(
            :reference_no, 
            :service_id,
            :customer_id, 
            :service_date,
            :service_status,
            :total_amount,
            :user_id
        )");

        return $statement->execute($data);
    }

    public function findByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE service_order_id = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function updateData($data)
    {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            reference_no = :reference_no, 
            service_id = :service_id,
            customer_id = :customer_id, 
            service_date = :service_date,
            service_status = :service_status,
            total_amount = :total_amount,
            user_id = :user_id
            WHERE order_service_id = :order_service_id
        ");
        return $statement->execute($data);
    }

    public function dropData($id)
    {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE service_order_id = '$id'");
        return $statement->execute();
    }
}