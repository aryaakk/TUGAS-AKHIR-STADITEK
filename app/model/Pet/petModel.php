<?php

namespace staditek\TugasAkhir\App\model\Pet;

use staditek\TugasAkhir\App\config\database;

class petModel extends database
{
    private $table = 'tbl_pet';

    public function showData()
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data)
    {
        $statement = self::$conn->prepare("INSERT INTO $this->table(pet_name, pet_description, pet_category_id, vendor_id, pet_images, pet_status, user_id) VALUES(
            :pet_name,
            :pet_description, 
            :pet_category_id,
            :vendor_id,
            :pet_images,
            :pet_status,
            :user_id
        )");
        return $statement->execute($data);
    }

    public function findByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE pet_id = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function updateData($data)
    {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            pet_name = :pet_name, 
            pet_description = :pet_description, 
            pet_category_id = :pet_category_id,
            vendor_id = :vendor_id,
            pet_images = :pet_images,
            pet_status  = :pet_status,
            user_id = :user_id
            WHERE pet_id = :pet_id
        ");
        return $statement->execute($data);
    }

    public function dropData($id)
    {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE pet_id = '$id'");
        return $statement->execute();
    }
}