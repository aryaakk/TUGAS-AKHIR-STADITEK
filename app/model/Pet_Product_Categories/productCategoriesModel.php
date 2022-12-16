<?php

namespace staditek\TugasAkhir\App\model\Pet_Product_Categories;

use staditek\TugasAkhir\App\config\database;

class productCategoriesModel extends database
{
    private $table = 'tbl_pet_product_category';

    public function showData()
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data)
    {
        $statement = self::$conn->prepare("INSERT INTO $this->table(category_name, description, user_id) VALUES(
            :category_name, 
            :description,
            :user_id
        )");
        return $statement->execute($data);
    }

    public function findByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE product_category_id = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function updateData($data)
    {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            category_name = :category_name, 
            description = :description,
            user_id = :user_id
            WHERE product_category_id = :product_category_id
        ");
        return $statement->execute($data);
    }

    public function dropData($id)
    {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE product_category_id = '$id'");
        return $statement->execute();
    }
}