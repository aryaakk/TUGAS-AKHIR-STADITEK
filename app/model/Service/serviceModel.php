<?php

namespace staditek\TugasAkhir\App\model\Service;

use staditek\TugasAkhir\App\config\database;

class serviceModel extends database
{
    private $table = 'tbl_service';

    public function showData()
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data)
    {
        $statement = self::$conn->prepare("INSERT INTO $this->table(reference_no, service_name, service_picture, service_detail, service_fee, user_id) VALUES(
            :reference_no, 
            :service_name,
            :service_picture,
            :service_detail,
            :service_fee,
            :user_id
        )");
        return $statement->execute($data);
    }

    public function findByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE service_id = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function updateData($data)
    {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            reference_no = :reference_no, 
            service_name= :service_name,
            service_picture = :service_picture, 
            service_detail= :service_detail,
            service_fee = :service_fee,
            user_id = :user_id
            WHERE service_id = :service_id 
        ");
        return $statement->execute($data);
    }

    public function dropData($id)
    {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE service_id = '$id'");
        return $statement->execute();
    }
}