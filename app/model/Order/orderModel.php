<?php

namespace staditek\TugasAkhir\App\model\Order;

use staditek\TugasAkhir\App\config\database;

class orderModel extends database
{
    private $table = 'tbl_order';

    public function showData()
    {
        $statement = self::$conn->prepare("SELECT customer_name, contact_number, order_date, order_status, expected_delivery_date, total_amount, number_of_items FROM $this->table LEFT JOIN tbl_customer ON tbl_order.customer_id = tbl_customer.customer_id");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data)
    {
        $statement = self::$conn->prepare("INSERT INTO $this->table(reference_no, customer_id, order_date, order_status, expected_delivery_date, total_amount, number_of_items, user_id) VALUES(
            :reference_no, 
            :customer_id,
            :order_date,
            :order_status,
            :expected_delivery_date,
            :total_amount,
            :number_of_items,
            :user_id
        )");
        return $statement->execute($data);
    }

    public function findByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE order_id = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function updateData($data)
    {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            reference_no = :reference_no, 
            customer_id = :customer_id,
            order_date = :order_date,
            order_status = :order_status,
            expected_delivery_date = :expected_delivery_date,
            total_amount = :total_amount,
            number_of_items  = :number_of_items,
            user_id= :user_id
            WHERE order_id = :order_id 
        ");
        return $statement->execute($data);
    }

    public function dropData($id)
    {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE order_id = '$id'");
        return $statement->execute();
    }
}