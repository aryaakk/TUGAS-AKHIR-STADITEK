<?php

namespace staditek\TugasAkhir\App\model\Payment;

use staditek\TugasAkhir\App\config\database;

class paymentModel extends database
{
    private $table = 'tbl_payment';

    public function showData()
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data)
    {
        $statement = self::$conn->prepare("INSERT INTO $this->table(reference_no, payment_for, amount_paid, payment_status, paid_by, user_id ) VALUES(
            :reference_no, 
            :payment_for,
            :amount_paid,
            :payment_status,
            :paid_by,
            :user_id
        )");
        return $statement->execute($data);
    }

    public function findByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE payment_id = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function updateData($data)
    {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            reference_no= :reference_no, 
            payment_for= :payment_for,
            payment_for= :payment_for,
            amount_paid= :amount_paid,
            payment_status= :payment_status,
            paid_by= :paid_by,
            user_id= :user_id
            WHERE payment_id = :payment_id
        ");
        return $statement->execute($data);
    }

    public function dropData($id)
    {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE payment_id = '$id'");
        return $statement->execute();
    }
}