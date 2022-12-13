<?php

namespace staditek\TugasAkhir\App\model\Customer;

use staditek\TugasAkhir\App\config\database;

class customerModel extends database
{
    private $table = 'tbl_customer';

    public function showData()
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data)
    {
        $statement = self::$conn->prepare("INSERT INTO $this->table(customer_code, customer_name, email_address, contact_number, complete_address, avatar, username, password, status, user_id) VALUES(
            :customer_code,
            :customer_name,
            :email_address,
            :contact_number,
            :complete_address,
            :avatar,
            :username,
            :password,
            :status,
            :user_id
        )");
        return $statement->execute($data);
    }

    public function findByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE customer_id  = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function updateData($data)
    {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            customer_code = :customer_code,
            customer_name = :customer_name,
            email_address = :email_address,
            contact_number = :contact_number,
            complete_address = :complete_address,
            avatar = :avatar,
            username = :username,
            password = :password,
            status = :status,
            user_id = :user_id
            WHERE customer_id = :customer_id
        ");
        return $statement->execute($data);
    }

    public function dropData($id)
    {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE customer_id = '$id'");
        return $statement->execute();
    }
}