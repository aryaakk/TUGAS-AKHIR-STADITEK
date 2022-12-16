<?php

namespace staditek\TugasAkhir\App\model\Pet_Category;

use staditek\TugasAkhir\App\config\database;

class petCategoryModel extends database
{
    private $table = 'tbl_pet_category';

    public function showData()
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data)
    {
        $statement = self::$conn->prepare("INSERT INTO $this->table(pet_category_name, user_id) VALUES(
            :pet_category_name, 
            :user_id
        )");
        return $statement->execute($data);
    }

    public function findByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE pet_category_id = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function updateData($data)
    {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            pet_category_name= :pet_category_name, 
            user_id= :user_id
            WHERE pet_category_id = :pet_category_id
        ");
        return $statement->execute($data);
    }

    public function dropData($id)
    {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE pet_category_id = '$id'");
        return $statement->execute();
    }
}