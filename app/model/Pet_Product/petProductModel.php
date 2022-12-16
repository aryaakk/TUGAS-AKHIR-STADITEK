<?php

namespace staditek\TugasAkhir\App\model\Pet_Product;

use staditek\TugasAkhir\App\config\database;

class petProductModel extends database
{
    private $table = 'tbl_pet_product';

    public function showData()
    {
        $statement = self::$conn->prepare("SELECT $this->table.*, tbl_pet_product_category.* FROM $this->table JOIN tbl_pet_product_category ON $this->table.product_category_id = tbl_pet_product_category.product_category_id");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function showDataName(string $by = "")
    {
        $statement = self::$conn->prepare("SELECT $this->table.*, tbl_pet_product_category.* FROM $this->table JOIN tbl_pet_product_category ON $this->table.product_category_id = tbl_pet_product_category.product_category_id JOIN tbl_vendor ON $this->table.vendor_id = tbl_vendor.company_id WHERE company_name = '".$by."'");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getNumRowsSpes(string $by = "")
    {
        $statement = self::$conn->prepare("SELECT $this->table.*, tbl_pet_product_category.* FROM $this->table JOIN tbl_pet_product_category ON $this->table.product_category_id = tbl_pet_product_category.product_category_id WHERE category_name = '".$by."'");
        $statement->execute();

        return $statement->rowCount();
    }
    public function getNumRowsName(string $by = "")
    {
        $statement = self::$conn->prepare("SELECT $this->table.*, tbl_pet_product_category.* FROM $this->table JOIN tbl_pet_product_category ON $this->table.product_category_id = tbl_pet_product_category.product_category_id JOIN tbl_vendor ON $this->table.vendor_id = tbl_vendor.company_id WHERE company_name = '".$by."'");
        $statement->execute();

        return $statement->rowCount();
    }
    public function getNumRows()
    {
        $statement = self::$conn->prepare("SELECT $this->table.*, tbl_pet_product_category.* FROM $this->table JOIN tbl_pet_product_category ON $this->table.product_category_id = tbl_pet_product_category.product_category_id");
        $statement->execute();

        return $statement->rowCount();
    }

    public function showDataID(string $by = "")
    {
        $statement = self::$conn->prepare("SELECT $this->table.*, tbl_pet_product_category.* FROM $this->table JOIN tbl_pet_product_category ON $this->table.product_category_id = tbl_pet_product_category.product_category_id JOIN tbl_vendor ON $this->table.vendor_id = tbl_vendor.company_id WHERE pet_product_id = '".$by."'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function showDataCategory(string $by = "")
    {
        $statement = self::$conn->prepare("SELECT $this->table.*, tbl_pet_product_category.* FROM $this->table JOIN tbl_pet_product_category ON $this->table.product_category_id = tbl_pet_product_category.product_category_id JOIN tbl_vendor ON $this->table.vendor_id = tbl_vendor.company_id WHERE category_name = '".$by."'");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data)
    {
        $statement = self::$conn->prepare("INSERT INTO $this->table(product_code, product_image, product_name, product_detail, product_category_id, quantity_on_hand, vendor_price, retail_price, discount, vendor_id, status, user_id) VALUES(
            :product_code, 
            :product_image, 
            :product_name,
            :product_detail,
            :product_category_id,
            :quantity_on_hand,
            :vendor_price,
            :retail_price,
            :discount,
            :vendor_id,
            :status,
            :user_id
        )");
        return $statement->execute($data);
    }

    public function findByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE pet_product_id = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }
    public function getNumByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE pet_product_id = '$id'");
        $statement->execute();

        return $statement->rowCount();
    }

    public function updateData($data)
    {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            product_code = :product_code, 
            product_image = :product_image, 
            product_name = :product_name,
            product_detail = :product_detail,
            product_category_id = :product_category_id,
            quantity_on_hand = :quantity_on_hand,
            vendor_price = :vendor_price,
            retail_price = :retail_price,
            discount = :discount,
            vendor_id = :vendor_id,
            status = :status,
            user_id = :user_id
            WHERE pet_product_id = :pet_product_id
        ");
        return $statement->execute($data);
    }

    public function dropData($id)
    {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE pet_product_id = '$id'");
        return $statement->execute();
    }
}